<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
<div style="text-align: left">
    <h2>Search For Cars</h2>

    <input type="text" wire:model="searchInput" placeholder="Search for Car....">

    <button wire:click="searchforcar">Search</button>
    <button wire:click="resetArray">Reset</button>


 
    @foreach ($matchedCars as $car)
        <h3></h3>
        <table style="width:30%">
        <tr>
            <th><a href="{{route('cars.show', ['id' => $car->id])}}">
                Car ID:</a></th>
            <td><a href="{{route('cars.show', ['id' => $car->id])}}">
                {{$car->id}}</a></td>
        </tr>
        <tr>
            <th>Manufacture:</th>
            <td><a href="{{route('cars.show', ['id' => $car->id])}}">
                {{$car->manufacture}}</a></td>
        </tr>
        <tr>
            <th>Model:</th>
            <td><a href="{{route('cars.show', ['id' => $car->id])}}">
                {{$car->model}}</a></td>
        </tr>
        <tr>
            <th>Year:</th>
            <td><a href="{{route('cars.show', ['id' => $car->id])}}">
                {{$car->year}}</a></td>
        </tr>
        </table>
    @endforeach

</div>