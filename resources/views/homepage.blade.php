@extends('layouts.appp')

@section('title', "The Car Review site")

@section('content')


<img src="images/pic_trulli.jpg" alt="Trulli" width="500" height="333"/>
    <img src="{{ asset('images/pic_trulli.jpg') }}" alt="tag"/>
    {!! Html::image('images/pic_trulli.jpg') !!}
    <img src="{{URL::to('images/toyota_yaris_blue.jpg')}}" alt="" width="500" height="333"/>
    <div>
        <h1>Welcome to The Car Review site !!</h1>
        <h3>The best car reviews online</h3>
    </div>
    
    @endsection