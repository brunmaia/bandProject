@extends('layouts.frontOffice')

@section('content')

<div class="container">

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
                            View/Edit
                        </button>
                    </a>
                </td>
                <td>
                    <a href="{{ route('deleteAlbum',$item->id) }}">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{route('addAlbum',$band->id)}}">Adicionar Album</a>

</div>

@endsection
