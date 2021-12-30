<head>
    <title>Laravel Watchtower</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300&family=Karla:wght@400;500;600&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>body{background:#f5f5f5}a,p{margin:0;font-family:Karla,sans-serif}pre p{font-family:'JetBrains Mono',monospace}a{color:#000;text-decoration:none}.p-4{padding:1rem}.px-4{padding-left:1rem;padding-right:1rem}.py-2{padding-top:.5rem;padding-bottom:.5rem}.max-w-7xl{max-width:80rem}.w-full{width:100%}.mx-auto{margin-left:auto;margin-right:auto}.grid{display:grid}.grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.grid-cols-4{grid-template-columns:repeat(4,minmax(0,1fr))}.col-span-2{grid-column:span 2/span 2}.col-span-3{grid-column:span 3/span 3}.mt-10{margin-top:2.5rem}.my-10{margin:2.5rem 0}.mt-5{margin-top:1.25rem}.my-5{margin:1.25rem 0}.gap-x-6{column-gap:1.5rem}.error-item{display:block;padding:1rem;border-radius:.25rem}.card{padding:1rem;border-radius:.25rem;box-shadow:0 1px 2px rgba(0,0,0,.1)}.shadow{box-shadow:0 1px 2px rgba(0,0,0,.1)}.rounded{border-radius:.25rem}.border-lightgray-bottom{border-bottom:1px #d3d3d3 solid}.border-lightgray-top{border-top:1px #d3d3d3 solid}.border-lightgray-left{border-left:1px #d3d3d3 solid}.border-lightgray-right{border-right:1px #d3d3d3 solid}.bg-white{background-color:#fff}.bg-red{background-color:#ffedd5}.bg-lightgray{background-color:#d3d3d3}.bg-orange-50{background-color:#fff7ed}.text-gray{color:gray}.block{display:block}.text-xs{font-size:.75rem;line-height:1rem}.text-sm{font-size:.875rem;line-height:1.25rem}.text-lg{font-size:1.125rem;line-height:1.75rem}.text-3xl{font-size:1.875rem;line-height:2.25rem}.logo{font-size:1.125rem;line-height:1.2rem}.line{line-height:1.75rem}.solve-button{text-decoration:underline}.solve-button:hover{text-decoration:none}.stacktrace p{cursor:pointer}.stacktrace p:hover{background-color:#fffbf7}.break-word{word-break: break-word;}</style>
</head>
<body>
    <div class="max-w-7xl w-full mx-auto">
        <div class="mt-5">
            <a href="{{route(config('laravel-watchtower.notifications.local.routes.index.name'))}}" class="logo"><span style="">Laravel</span><br/><span style="background-color: #F97316">Watchtower</span></a>
        </div>
        @yield('body')
    </div>
</body>