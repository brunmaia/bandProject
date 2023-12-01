@extends('layouts.frontOffice')

@section('content')

<div class="container">

    <section style="text-align:center">
        <img style="width:300px" src="{{$band->photo ? asset('storage/'.$band->photo):asset('storage/images/noPhoto.png')}}">

        <H2>{{$band->name}}</H2>
        <p>{{$band->description}}</p>

    </section>

    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">Album Name</th>
                <th scope="col">Year</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $item)
            <tr>
                <td><img width="30px" height="30px" src="{{asset('storage/'.$item->photo)}}"></td>
                <td>{{$item->title}}</td>
                <td>{{$item->year}}</td>
                <td>
                    <a href="{{ route('viewAlbum',$item ->id) }}">
                        <button class="btn btn-warning">
                            View
                        </button>
                    </a>
                </td>
                @auth
                @if (Auth::user()->user_type==1)
                <td>
                    <a href="{{ route('deleteAlbum',$item->id) }}">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </td>
                @endif
                @endauth


            </tr>
            @endforeach
        </tbody>
    </table>
    @auth
    @if (Auth::user()->user_type==1)
    <a href="{{route('addAlbum',$band->id)}}">Adicionar Album</a>
    @endif
    @endauth
</div>

@endsection
