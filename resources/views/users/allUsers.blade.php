@extends('layouts.frontOffice')

@section('content')

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

    <table class="table table-striped" style="text-align: center">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">User Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td><img width="30px" height="30px" src="{{$item->photo ? asset('storage/'.$item->photo):asset('storage/images/noPhoto.png')}}"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>@if($item->user_type == \App\Models\User::ADMIN)
                    Admin
                    @else
                    General
                    @endif
                </td>
                <td>
                    <a href="{{ route('viewUser',$item ->id) }}">
                        <button class="btn btn-warning">
                            Edit
                        </button>
                    </a>
                </td>
                <td>
                    <a href="{{ route('deleteUser',$item ->id) }}">
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
