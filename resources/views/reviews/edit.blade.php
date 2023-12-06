@extends('layouts.appp')

@section('title', 'Edit Review')

@section('content')

    <form method="post" action="{{ route('reviews.update', ['id' => $review->id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-text-input id="id" name="id" type="hidden" class="mt-1 block w-full" :value="old('id', $review->id)" required autofocus autocomplete="id" />
            <x-input-error class="mt-2" :messages="$errors->get('id')" />
        </div>

        <div>
            <x-input-label for="car_id" :value="__('Car ID')" />
            <x-text-input id="car_id" name="car_id" type="text" class="mt-1 block w-full" :value="old('car_id', $review->car_id)" required autofocus autocomplete="car_id" />
            <x-input-error class="mt-2" :messages="$errors->get('car_id')" />
        </div>

        <div>
            <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" :value="old('user_id', $review->user_id)" required autocomplete="user_id" />
            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
        </div>

        <div>
            <x-input-label for="stars" :value="__('Stars')" />
            <x-text-input id="stars" name="stars" type="text" class="mt-1 block w-full" :value="old('stars', $review->stars)" required autofocus autocomplete="stars" />
            <x-input-error class="mt-2" :messages="$errors->get('stars')" />
        </div>

        <div>
            <x-input-label for="comment" :value="__('Comment')" />
            <x-text-input id="comment" name="comment" type="text" class="mt-1 block w-full" :value="old('comment', $review->comment)" required autofocus autocomplete="comment" />
            <x-input-error class="mt-2" :messages="$errors->get('comment')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'reviews-updated')
                <p>{{ __('Saved.') }}</p>
            @endif
        </div>

    </form>

    <h2><a href="{{ route('reviews.show', ['id' => $review->id])}}">Back</a></h2>



@endsection