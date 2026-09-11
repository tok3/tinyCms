#!/usr/bin/env python3
"""Repair only storage/app/temp; preserve owners and save the old ACLs first."""
import datetime
import grp
import os
from pathlib import Path
import stat
import subprocess


def main():
    if os.geteuid() != 0:
        raise SystemExit('Run this script with sudo.')
    target = Path(__file__).resolve().parents[1] / 'storage/app/temp'
    if target.is_symlink():
        raise SystemExit('Refusing a symlink as the temporary directory.')
    gid = grp.getgrnam('www-data').gr_gid
    parent = target.parent.stat()
    if parent.st_gid != gid or not parent.st_mode & stat.S_ISGID:
        raise SystemExit('storage/app must already use group www-data and setgid for safe recreation.')
    stamp = datetime.datetime.now(datetime.timezone.utc).strftime('%Y%m%dT%H%M%S%fZ')
    backup = Path('/var/backups/akb') / ('temp-permissions-' + stamp + '.acl')
    backup.parent.mkdir(mode=0o700, parents=True, exist_ok=True)
    if target.exists():
        fd = os.open(backup, os.O_WRONLY | os.O_CREAT | os.O_EXCL, 0o600)
        with os.fdopen(fd, 'w') as output:
            subprocess.run(['getfacl', '-R', '-P', '-p', str(target)], stdout=output, check=True)
    else:
        target.mkdir(mode=0o2770)
    counts = {'directories': 0, 'files': 0, 'symlinks_skipped': 0}

    def repair(path):
        mode = path.lstat().st_mode
        if stat.S_ISLNK(mode):
            counts['symlinks_skipped'] += 1
            return
        if stat.S_ISDIR(mode):
            os.chown(path, -1, gid)
            os.chmod(path, 0o2770)
            counts['directories'] += 1
            for child in path.iterdir():
                repair(child)
        elif stat.S_ISREG(mode):
            os.chown(path, -1, gid)
            os.chmod(path, 0o660)
            counts['files'] += 1

    repair(target)
    subprocess.run(['setfacl', '-m', 'd:u::rwx,d:g::rwx,d:o::---', str(target)], check=True)
    print('Repaired:', counts)
    print('Previous permissions:', backup)


if __name__ == '__main__':
    main()
