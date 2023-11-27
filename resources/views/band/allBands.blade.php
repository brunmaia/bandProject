@extends('layouts.frontOffice')

@section('content')
<div class="container">

    <a href="{{route('addBand')}}">Adicionar nova banda</a>
</div>
<h1>
    Aqui ves todos os users
</h1>
@if (session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif
@if(session('alert'))
<div class="alert alert-danger">
    {{session('alert')}}
</div>
@endif

<div class="container">

    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">Band Name</th>
                <th scope="col">Albums Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bandsWithCounts as $item)
            <tr>
                <td><img width="30px" height="30px" src="{{$item->photo ? asset('storage/'.$item->photo):asset('storage/images/noPhoto.png')}}"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->albums_count}}</td>
                <td>
                    <a href="{{ route('viewBand',$item ->id) }}">
                        <button class="btn btn-warning">
                            View/Edit
                        </button>
                    </a>
                </td>
                <td>
                    <a href="{{ route('deleteBand',$item ->id) }}">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>
    <div class=""><a href="{{route('home')}}">Voltar</a></div>

</div>



@endsection
