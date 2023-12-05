@extends('layouts.frontOffice')
@section('content')
<div class="container">

    <form method="POST" action="{{route('updateUser')}}" enctype="multipart/form-data">
        @csrf
        <div hidden class="mb-3">

            <label for="exampleInputName1" class="form-label">Id</label>
            <input name="id" type="number" value='{{$user->id}}' class="form-control" id="exampleInputName1" aria-describedby="nameHelp">

        </div>
        <div hidden class="mb-3">

            <input name="oldphoto" type="text" value='{{$user->photo}}'>

        </div>
        <div class="container">
            <img name="profilePhoto" style="width:100px" src="{{asset('storage/'.$user->photo)}}" alt="Profile photo">

        </div>
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name</label>
            <input name="name" type="text" required value='{{$user->name}}' class="form-control" id="exampleInputName1" aria-describedby="nameHelp">

            @error('name')
            <div class="--bs-danger-text-emphasis">

                Erro de nome!
            </div>
            @enderror
            <div id="nameHelp" class="form-text">Insert your name here.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input disabled required name="email" type="email" value='{{$user->email}}' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">


            @error('email:unique:users')
            <div class="--bs-danger-text-emphasis">

                Erro de email.
            </div>
            @enderror
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPhone1" class="form-label">Phone</label>
            <input name="phone" type="number" value='{{$user->phone}}' class="form-control" id="exampleInputPhone1" aria-describedby="phoneHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" required value='{{$user->password}}' class="form-control" id="exampleInputPassword1">

            @error('password')
            <div class="--bs-danger-text-emphasis">
                Erro de Password!
            </div>
            @enderror
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input name="photo" accept="image/*" type="file" id="photo" class="form-control">

                @error('photo')
                <div class="--bs-danger-text-emphasis">
                    Erro de Foto!
                </div>

                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>


    <div class=""><a href="{{route('home')}}">Voltar</a></div>
</div>


@endsection
