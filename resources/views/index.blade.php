@extends('laravel-watchtower::layout')
@section('body')
    <div class="grid grid-cols-4 gap-x-6 my-5">
        <div class="card bg-white">
            <p>Latest</p>
            <p class="text-3xl">{{$lastestDateTime}}</p>
        </div>
        <div class="card bg-white">
            <p>Last 24 hours</p>
            <p class="text-3xl">{{$last24Hours}}</p>
        </div>
        <div class="card bg-white">
            <p>Last 30 days</p>
            <p class="text-3xl">{{$last30Days}}</p>
        </div>
    </div>

    <div class="bg-white rounded shadow">
        @foreach($errors as $error)
            <a
                href="{{route(config('laravel-watchtower.notifications.local.routes.show.name'), ['error' => $error->id])}}"
                class="error-item"
            >
                <div class="grid grid-cols-4">
                    <div class="col-span-3">
                        <p class="text-lg">{{$error->message}}</p>
                        <p class="text-gray break-word">{{$error->file}}</p>
                    </div>
                    <div>
                        <p>Happen:</p>
                        <p>{{$error->created_at}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection