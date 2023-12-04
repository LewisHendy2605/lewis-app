<div style="text-align: left">
    <h2>Search For Cars</h2>

    <form wire:submit.prevent="setCar">
        <input type="text" wire:model="carID" placeholder="Search by ID....">

        <ul> 
            <li>ID: {{$car->id}}</li> 
            <li>Manufacture: {{$car->manufacture}}</li>
            <li>Model: {{$car->model}}</li>   
            <li>Year: {{$car->year}}</li>
        </ul>
 
        <button type="submit">Search</button>
    </form>


    
    
</div>