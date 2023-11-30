<head>
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
</body>