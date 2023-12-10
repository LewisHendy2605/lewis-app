<!DOCTYPE html>
<style type="text/css">
    .my-active span{
        background-color: #5cb85c !important;
        color: white !important;
        border-color: #5cb85c !important;
    }
    ul.pager>li {
        display: inline-flex;
        padding: 5px;
    }
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

    <button><h4><a href="{{ route('cars.index')}}">Cars</a></h4></button>
    <button><h4><a href="{{ route('reviews.index')}}">Reviews</a></h4></button>

    @can('moderator')
        <button><h4><a href="{{ route('comments.index')}}">Comments</a></h4></button>
    @endcan

    @can('admin')
        <button><h4><a href="{{ route('users.index')}}">Users</a></h4></button>
    @endcan

    @if (Route::has('login'))
        @auth
            <button><h4><a href="{{ route('dashboard') }}">Dashboard</a></h4></button>
        @else
            <button><h4><a href="{{ route('login') }}">Log in</a></button>
            @if (Route::has('register'))
                <button><h4><a href="{{ route('register') }}">Register</a></h4></button>
            @endif
        @endauth
    @endif

    <br>

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

    <br>

    <div> 
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>