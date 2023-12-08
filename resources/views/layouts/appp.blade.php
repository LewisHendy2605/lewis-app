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

    <button><a href="{{ route('cars.index')}}">Cars</a></button>
    <button><a href="{{ route('reviews.index')}}">Reviews</a></button>
    <button><a href="{{ route('users.index')}}">Users</a></button>
    <button><a href="{{ route('comments.index')}}">Comments</a></button>

    @if (Route::has('login'))
        @auth
            <button><a href="{{ route('dashboard') }}">Dashboard</a></button>
        @else
            <button><h4><a href="{{ route('login') }}">Log in</a></button>
            @if (Route::has('register'))
                <button><h4><a href="{{ route('register') }}">Register</a></h4></button>
            @endif
        @endauth
    @endif

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