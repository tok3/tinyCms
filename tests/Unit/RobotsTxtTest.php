<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RobotsTxtTest extends TestCase
{
    public function test_it_points_to_the_canonical_org_sitemap(): void
    {
        $robots = file_get_contents(dirname(__DIR__, 2).'/public/robots.txt');

        self::assertSame(
            1,
            substr_count($robots, 'Sitemap: https://aktion-barrierefrei.org/sitemap.xml')
        );
        self::assertStringNotContainsString(
            'Sitemap: https://aktion-barrierefrei.de/sitemap.xml',
            $robots
        );
    }
}
