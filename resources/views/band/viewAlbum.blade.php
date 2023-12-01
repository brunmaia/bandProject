@extends('layouts.frontOffice')

@section('content')
@if (session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif


<div class="container">
    <section style="text-align: center">
        <img style="width: 250px" src="{{asset('storage/'.$album->photo)}}" alt="">
        <h2>{{$album->title}}</h2>
        <h3>Year:{{$album->year}}</h3>
        <p>{{$album->description}}</p>


    </section>
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
        <div class="mb-3">

            <label for="description" class="form-label">Description:</label><br>
            <textarea name="description" class="form-control" type="text" id="dynamic-textarea" value="{{$album->description}}" oninput="autoAdjustHeight(this)"></textarea><br>




            {{-- <label for="exampleInputDescription1" class="form-label">Description</label>
            <input name="description" type="text" value="{{$album->description}}" class="form-control" id="exampleInputDescription1" aria-describedby="descriptionHelp"> --}}

            @error('description')
            <div class="--bs-danger-text-emphasis">

                Erro de descrição!
            </div>
            @enderror
            <div id="descriptionHelp" class="form-text">Insert album description here.</div>
        </div>






        <button type="submit" class="btn btn-primary">Update</button>
    </form>


    @endauth
</div>



@endsection
