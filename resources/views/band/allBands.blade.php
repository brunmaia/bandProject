@extends('layouts.frontOffice')

@section('content')
</div>
@auth
@if (Auth::user()->user_type==\App\Models\User::ADMIN)

<div class="container">

    <a href="{{route('addBand')}}">Adicionar nova banda</a>
    @endif
    @endauth


    <h1>
        Aqui ves todas as Bandas
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
                                View Band
                            </button>
                        </a>
                    </td>
                    @auth
                    @if (Auth::user()->user_type==\App\Models\User::ADMIN)

                    <td>
                        <a href="{{ route('deleteBand',$item ->id) }}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                    @endif
                    @endauth


                </tr>
                @endforeach
            </tbody>
        </table>
        <div class=""><a href="{{route('home')}}">Voltar</a></div>

    </div>



    @endsection
