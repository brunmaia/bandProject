@extends('layouts.frontOffice')

@section('content')

<div class="container">
    <h2>{{$album->title}}</h2>
    <h3>Year:{{$album->year}}</h3>
    <img src="{{asset('storage/'.$album->photo)}}" alt="">



</div>
@endsection
