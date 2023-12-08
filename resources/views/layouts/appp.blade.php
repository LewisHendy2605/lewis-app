<!DOCTYPE html>
<style>
table, th, td {
    border: 2px solid green;;
    border-collapse: collapse;
    padding: 50px;
}
th, td {
  padding: 5px;
  text-align: left;
}

</style>
<head>
    @livewireStyles
    <title>@yield('title')</title>
</head>

<body> 
    <h1>@yield('title')</h1>

    @if ($errors->any())
        <div>
            Errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('message'))
        <p><b>{{ session('message') }}</b></p>
    @endif

    <div> 
        @yield('content')
    </div>
    @livewireScripts
</body>
</html>