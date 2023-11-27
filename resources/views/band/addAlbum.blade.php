@extends('layouts.frontOffice')

@section('content')

<div class="container">
    <div>
        <h2>Olá, aqui podes adicionar albuns</h2>

        <form method="POST" action="{{route('createAlbum')}}" enctype="multipart/form-data">

            @csrf


            <input hidden name="music_band_id" type="number" required value='{{$band->id}}'>


            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Album Name</label>
                <input name="title" type="text" required class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
                @error('name')
                <div class="--bs-danger-text-emphasis">

                    Erro de nome!
                </div>
                @enderror
                <div id="nameHelp" class="form-text">Insert album name here.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputYear1" class="form-label">Year</label>
                <input name="year" type="number" required class="form-control" id="exampleInputYear1" aria-describedby="YearHelp">
                @error('year')
                <div class="--bs-danger-text-emphasis">

                    Erro de ano!
                </div>
                @enderror
                <div id="nameHelp" class="form-text">Insert album year here.</div>
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

@endsection
