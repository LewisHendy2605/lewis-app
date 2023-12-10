@extends('layouts.appp')

@section('title', 'Edit Comment')

@section('content')

    <form method="post" action="{{ route('comments.update', ['id' => $comment->id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="id" :value="__('ID:  ')" />
            <x-text-input id="id" name="id" type="text" class="mt-1 block w-full" :value="old('id', $comment->id)" required autofocus autocomplete="id" />
            <x-input-error class="mt-2" :messages="$errors->get('id')" />
        </div>

        <div>
            <x-input-label for="review_id" :value="__('Review ID:  ')" />
            <x-text-input id="review_id" name="review_id" type="text" class="mt-1 block w-full" :value="old('review_id', $comment->review_id)" required autofocus autocomplete="review_id" />
            <x-input-error class="mt-2" :messages="$errors->get('manufacture')" />
        </div>

        <div>
            <x-input-label for="user_id" :value="__('User ID:  ')" />
            <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" :value="old('user_id', $comment->user_id)" required autocomplete="user_id" />
            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
        </div>

        <div>
            <x-input-label for="comment" :value="__('Cmment:  ')" />
            <x-text-input id="comment" name="comment" type="text" class="mt-1 block w-full" :value="old('comment', $comment->comment)" required autofocus autocomplete="comment" />
            <x-input-error class="mt-2" :messages="$errors->get('comment')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'comment-updated')
                <p>{{ __('Saved.') }}</p>
            @endif
        </div>

    </form>

    <button><a href="{{ route('comments.show', ['id' => $comment->id])}}">Back</a></button>



@endsection