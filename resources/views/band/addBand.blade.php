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
            <div class="mb-3">

                <label for="description" class="form-label">Description:</label><br>
                <textarea class="form-control" id="dynamic-textarea" name="description" oninput="autoAdjustHeight(this)"></textarea>


                {{-- <label for="exampleInputDescription1" class="form-label">Description</label>
                <input style="width: 200px; padding: 8px; overflow: auto; word-wrap: break-word;" name="description" type="text" value="" class="form-control" id="exampleInputDescription1" aria-describedby="descriptionHelp">
 --}}


                @error('description')
                <div class="--bs-danger-text-emphasis">

                    Erro de descrição!
                </div>
                @enderror
                <div id="descriptionHelp" class="form-text">Insert band description here.</div>
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
<br>
<div class="container"><a href="{{route('home')}}">Voltar</a></div>



@endsection
