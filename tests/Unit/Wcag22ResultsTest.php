<?php

use App\Console\Commands\ScanAccessibility22;

test('WCAG 2.2 results retain separate elements and nested axe targets', function () {
    $method = new ReflectionMethod(ScanAccessibility22::class, 'normalizeAxeResults');
    $results = $method->invoke(new ScanAccessibility22(), [[
        'id' => 'target-size',
        'help' => 'Targets must be large enough',
        'description' => 'Check target size',
        'impact' => 'serious',
        'tags' => ['wcag22aa'],
        'nodes' => [
            ['target' => ['#first'], 'html' => '<button id="first">A</button>'],
            ['target' => ['#second'], 'html' => '<button id="second">B</button>'],
            ['target' => ['#first']],
            ['target' => [['#frame', '#inside']]],
        ],
    ]]);

    expect($results)->toHaveCount(3)
        ->and(array_column($results, 'selector'))->toBe(['#first', '#second', '[["#frame","#inside"]]'])
        ->and($results[0]['code'])->toBe('target-size')
        ->and($results[0]['runnerExtras']['tags'])->toBe(['wcag22aa']);
});

test('a successful WCAG 2.2 scan may contain no violations', function () {
    $method = new ReflectionMethod(ScanAccessibility22::class, 'normalizeAxeResults');
    expect($method->invoke(new ScanAccessibility22(), []))->toBe([]);
});
