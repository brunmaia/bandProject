@extends('layouts.frontOffice')
@section('content')
<div class="container">
    <div>
        <h2>Olá, aqui podes adicionar bandas</h2>

        <form method="POST" action="{{route('createBand')}}" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Name</label>
                <input name="name" type="text" required class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
                @error('name')
                <div class="--bs-danger-text-emphasis">

                    Erro de nome!
                </div>
                @enderror
                <div id="nameHelp" class="form-text">Insert band name here.</div>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input name="photo" accept="image/*" type="file" id="photo" class="form-control">

                @error('photo')
                <div class="--bs-danger-text-emphasis">
                    Erro de Foto!
                </div>

                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
<p></p>
<div class="container"><a href="{{route('home')}}">Voltar</a></div>
@endsection
