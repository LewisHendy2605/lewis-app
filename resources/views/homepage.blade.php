@extends('layouts.appp')

@section('title', "Lewis' Car Review's")

@section('content')


    <img src="pic_trulli.jpg" alt="Trulli" width="500" height="333"/>
    <img src="{{ asset('pic_trulli.jpg') }}" alt="tag"/>
    {!! Html::image('pic_trulli.jpg') !!}
    
    
    @endsection