@extends('layouts.appp')

@section('title', 'User Dashboard')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-right">
        <a href="{{ route('home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Home</a>
    </h2>

    <ul> 
        <li>User ID: {{Auth::id()}}</li>
    </ul>

    <div>
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>

    <br>

    <button><a href="{{ route('profile.edit') }}" >Edit Profile</a></button>

    <br>

    <livewire:show-user-reviews :id="Auth::id()"/>
    

    <button :href="route('profile.edit')">
            {{ __('Profile - Laravel') }}
    </button>

@endsection