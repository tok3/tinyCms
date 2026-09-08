<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Mockery;
use Illuminate\Support\Facades\Event;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // Laravel Event Dispatcher deaktivieren
        Event::fake();

        // Sluggable-Service für Tests mocken, solange die Klasse noch nicht autoloaded ist.
        if (! class_exists(\Cviebrock\EloquentSluggable\Services\SlugService::class, false)) {
            Mockery::mock('alias:Cviebrock\EloquentSluggable\Services\SlugService')
                ->shouldReceive('createSlug')
                ->andReturn('test-slug');
        }
    }

}
