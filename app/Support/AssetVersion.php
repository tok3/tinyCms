<?php

namespace App\Support;

class AssetVersion
{
    public static function for(string $publicPath): string
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            $request = request();

            if (! $request->attributes->has('admin_asset_version')) {
                $request->attributes->set('admin_asset_version', now()->format('Uu'));
            }

            return $request->attributes->get('admin_asset_version');
        }

        $absolutePath = public_path(ltrim($publicPath, '/'));

        return (string) (is_file($absolutePath) ? filemtime($absolutePath) : 1);
    }
}
