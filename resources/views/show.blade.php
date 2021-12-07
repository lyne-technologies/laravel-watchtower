@extends('laravel-watchtower::layout')
@section('body')
    <div class="bg-white shadow rounded my-5" style="margin-bottom: 1rem;">
        <div class="py-2 px-4 border-lightgray-bottom">
            @if(! $error->resolved)
                <a class="solve-button" href="{{route(config('laravel-watchtower.notifications.local.routes.solve.name'), ['error'=>$error->id])}}">Solve</a>
            @else
                <p>Solved</p>
            @endif
        </div>
        <div class="p-4">
            <p class="text-3xl">{{$error->message}}</p>
            <p>{{$error->file}}</p>
        </div>
    </div>
    <div
        class="grid grid-cols-3 bg-white shadow rounded border-lightgray-top"
        x-data="{ itemId: 0, stackTrace: {{json_encode($error->stack_trace)}} }"
        style="height: 95vh;"
    >
        <div class="border-lightgray-left border-lightgray-right stacktrace" style="width: 100%; overflow-y: scroll">
            @foreach($error->stack_trace as $key => $item)
                <p x-bind:class="itemId == {{$key}} ? 'bg-orange-50' : ''" class="{{Str::contains($item['file'], 'vendor') ? 'text-gray text-xs' : 'text-sm'}} border-lightgray-bottom"
                    x-on:click="itemId = {{$key}}"
                    style="word-wrap: break-word; {{Str::contains($item['file'], 'laravel/framework') ? 'padding: 0.5rem;' : 'padding: 1rem 0.5rem;'}}"
                >{{$item['file']}}</p>
            @endforeach
        </div>
        <div style="overflow-x: scroll" class="col-span-2">
            <div class="p-4 border-lightgray-bottom">
                <p x-text="stackTrace[itemId].file"></p>
            </div>

            <pre>
                <template x-for="content in stackTrace[itemId].content">
                    <p x-bind:class="stackTrace[itemId].line == content.number ? 'bg-red' : ''"><span style="padding: 0 0.75rem;" class="line" x-text="content.number"></span><span  style="padding: 0 0.75rem;" class="line" x-text="content.code"></span></p>
                </template>
            </pre>
        </div>
    </div>

@endsection