<?php

namespace LyneTechnologies\LaravelWatchtower\Http\Controllers;

use LyneTechnologies\LaravelWatchtower\Models\Error;
use Carbon\Carbon;

class ErrorController extends Controller
{
    public function index(){
        return view(config('laravel-watchtower.notifications.local.routes.index.view'), [
            'errors' => Error::where('resolved', 0)->orderBy('id', 'desc')->get(),
            'lastestDateTime' => Carbon::parse(Error::orderBy('id', 'desc')->first()->created_at)->format('d/m/y H:m'),
            'last24Hours' => Error::where('created_at', '>', Carbon::now()->subHours(24))->count(),
            'last30Days' => Error::where('created_at', '>', Carbon::now()->subDays(30))->count(),
        ]);
    }

    public function show(Error $error){
        return view(config('laravel-watchtower.notifications.local.routes.show.view'), [
            'error' => $error
        ]);
    }

    public function solve(Error $error){
        $error->resolved = 1;
        $error->save();
        return redirect(route(config('laravel-watchtower.notifications.local.routes.show.name'), ['error'=>$error->id]));
    }
}