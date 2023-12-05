@extends('layouts.frontOffice')
@section('content')
<div class="container">

    <form method="POST" action="{{route('password.update')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" value="{{request()->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nova Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Confirmar Password</label>
            <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
            <input type="hidden" name="token" value="{{request()->route('token')}}">
        </div>
        <input type="hidden" name="token" value="{{request()->route('token')}}">

        <button type="submit" class="btn btn-primary">Submeter nova pass</button>
    </form>

</div>


@endsection
