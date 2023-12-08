<div>
    <h3>Add a review</h3>
    <li>Stars: <input type="text" wire:model="stars"/></li>
    <li>Comment: <input type="text" wire:model="comment"/></li>
    <li>Car: <select wire:model="carid">
        @foreach ($cars as $car)
            <option value="{{ $car->id }}"
                @if ($car->id == old('car_id'))
                    selected="selected"
                @endif
                >{{ $car->manufacture }}, {{ $car->model }}, {{ $car->year }}
                </option>
            @endforeach
        </select></li>
    <button wire:click="createReview">Post</button>
</div>
