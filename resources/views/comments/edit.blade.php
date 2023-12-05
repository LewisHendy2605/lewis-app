@extends('layouts.appp')

@section('title', 'Edit Car')

@section('content')

    <form method="post" action="{{ route('cars.update', ['id' => $car->id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="id" :value="__('ID:  ')" />
            <x-text-input id="id" name="id" type="text" class="mt-1 block w-full" :value="old('id', $car->id)" required autofocus autocomplete="id" />
            <x-input-error class="mt-2" :messages="$errors->get('id')" />
        </div>

        <div>
            <x-input-label for="manufacture" :value="__('Manufacture:  ')" />
            <x-text-input id="manufacture" name="manufacture" type="text" class="mt-1 block w-full" :value="old('manufacture', $car->manufacture)" required autofocus autocomplete="manufacture" />
            <x-input-error class="mt-2" :messages="$errors->get('manufacture')" />
        </div>

        <div>
            <x-input-label for="model" :value="__('Model:  ')" />
            <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" :value="old('model', $car->model)" required autocomplete="model" />
            <x-input-error class="mt-2" :messages="$errors->get('model')" />
        </div>

        <div>
            <x-input-label for="year" :value="__('Year:  ')" />
            <x-text-input id="year" name="year" type="text" class="mt-1 block w-full" :value="old('year', $car->year)" required autofocus autocomplete="year" />
            <x-input-error class="mt-2" :messages="$errors->get('year')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'cars-updated')
                <p>{{ __('Saved.') }}</p>
            @endif
        </div>

    </form>

    <button><a href="{{ route('cars.show', ['id' => $car->id])}}">Back</a></button>



@endsection