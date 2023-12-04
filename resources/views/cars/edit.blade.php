@extends('layouts.appp')

@section('title', 'Create')

@section('content')

<form method="post" action="{{ route('cars.update', ['id' => $id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="id" :value="__('id')" />
            <x-text-input id="id" name="id" type="text" class="mt-1 block w-full" :value="old('id', $car->id)" required autofocus autocomplete="id" />
            <x-input-error class="mt-2" :messages="$errors->get('id')" />
        </div>

        <div>
            <x-input-label for="manufacture" :value="__('Manufacture')" />
            <x-text-input id="manufacture" name="manufacture" type="text" class="mt-1 block w-full" :value="old('manufacture', $car->manufacture)" required autofocus autocomplete="manufacture" />
            <x-input-error class="mt-2" :messages="$errors->get('manufacture')" />
        </div>

        <div>
            <x-input-label for="model" :value="__('Model')" />
            <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" :value="old('model', $car->model)" required autocomplete="model" />
            <x-input-error class="mt-2" :messages="$errors->get('model')" />

            
        </div>

    </form>

@endsection