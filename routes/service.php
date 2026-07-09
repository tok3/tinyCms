<?php

use App\Http\Controllers\ScriptController;
use Illuminate\Support\Facades\Route;

Route::get('/service/{ulid}/{tool}.js', [ScriptController::class, 'serveScript'])
    ->name('serveScript')
    ->middleware('service');

Route::get('/service/fixstern-icons.svg', [ScriptController::class, 'serveIconSprite'])
    ->name('serve.icons');

Route::get('/service/{tool}.css', [ScriptController::class, 'serveCss'])
    ->name('serve.css');
