@extends('layouts.frontOffice')

@section('content')
@if (session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif


<div class="container">

    <h2>{{$album->title}}</h2>
    <h3>Year:{{$album->year}}</h3>
    <img style="width: 250px" src="{{asset('storage/'.$album->photo)}}" alt="">
    @auth
    <h3>Edit:</h3>
    <form method="POST" action="{{route('updateAlbum')}}" enctype="multipart/form-data">

        @csrf


        <input hidden name="id" type="number" required value='{{$album->id}}'>


        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Album Name</label>
            <input name="title" type="text" value="{{$album->title}}" required class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            @error('name')
            <div class="--bs-danger-text-emphasis">

                Erro de nome!
            </div>
            @enderror
            <div id="nameHelp" class="form-text">Insert album name here.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputYear1" class="form-label">Year</label>
            <input name="year" type="number" value="{{$album->year}}" required class="form-control" id="exampleInputYear1" aria-describedby="YearHelp">

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



        <button type="submit" class="btn btn-primary">Update</button>
    </form>


    @endauth
</div>
@endsection
