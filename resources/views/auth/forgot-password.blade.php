@extends('layouts.frontOffice')
@section('content')
<div class="container">

    <form method="POST" action="{{route('password.email')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Recuperar</button>
    </form>
</div>


@endsection
