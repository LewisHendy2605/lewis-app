<div style="text-align: left">
    <h2>Search For Cars</h2>

    <input type="text" wire:model="searchInput" placeholder="Search for Car....">

    <button wire:click="searchforcar">Search</button>
    <button wire:click="resetArray">Reset</button>

    <ul> 
        @foreach ($matchedCars as $car)
            <li><a href="{{route('cars.show', ['id' => $car->id])}}" >
                Car ID: {{$car->id}}</a></li>   
            <li>Car Manufacture: {{$car->manufacture}}</li>
            <li>Car Model: {{$car->model}}</li> 
            <li>Car Year: {{$car->year}}</li>
            <p></p>
        @endforeach
    </ul>

</div>