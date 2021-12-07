<?php


use LyneTechnologies\LaravelWatchtower\Http\Controllers\ErrorController;

Route::get(config('laravel-watchtower.notifications.local.routes.index.url'), [ErrorController::class, 'index'])
    ->name(config('laravel-watchtower.notifications.local.routes.index.name'))
    ->middleware(config('laravel-watchtower.notifications.local.routes.index.middleware'));
Route::get(config('laravel-watchtower.notifications.local.routes.show.url'), [ErrorController::class, 'show'])
    ->name(config('laravel-watchtower.notifications.local.routes.show.name'))
    ->middleware(config('laravel-watchtower.notifications.local.routes.show.middleware'));
Route::get(config('laravel-watchtower.notifications.local.routes.solve.url'), [ErrorController::class, 'solve'])
    ->name(config('laravel-watchtower.notifications.local.routes.solve.name'))
    ->middleware(config('laravel-watchtower.notifications.local.routes.solve.middleware'));
