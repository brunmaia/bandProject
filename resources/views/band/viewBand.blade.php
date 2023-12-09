@extends('layouts.frontOffice')

@section('content')
@if (session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif

<div class="container">


    <section style="text-align:center">
        <img style="width:300px" src="{{$band->photo ? asset('storage/'.$band->photo):asset('storage/images/noPhoto.png')}}">
    </section>
    <section>
        <H2>{{$band->name}}</H2>
        <p>{{$band->description}}</p>
    </section>

    @auth
    <div class="container">

        @auth
        @if (Auth::user()->user_type==\App\Models\User::ADMIN)
        <a href="{{route('addAlbum',$band->id)}}"><button class="btn btn-success">Add Album</button></a>
        @endif
        <button type="button" class="btn btn-warning" id="editButton">Edit Band</button>
        @endauth

    </div>

    <section id="bandEdit" style="display: none;">

        <h3>Edit:</h3>
        <form method="POST" action="{{route('updateBand')}}" enctype="multipart/form-data">

            @csrf


            <input hidden name="id" type="number" required value='{{$band->id}}'>


            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Album Name</label>
                <input name="name" type="text" value="{{$band->name}}" required class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
                @error('name')
                <div class="--bs-danger-text-emphasis">

                    Erro de nome!
                </div>
                @enderror
                <div id="nameHelp" class="form-text">Update band name here.</div>
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
                <textarea name="description" class="form-control" type="text" id="dynamic-textarea" value="{{$band->description}}" oninput="autoAdjustHeight(this)"></textarea>

                @error('description')
                <div class="--bs-danger-text-emphasis">

                    Erro de descrição!
                </div>
                @enderror
                <div id="descriptionHelp" class="form-text">Update band description here.</div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </section>
    @endauth

    @if($albums->isEmpty())
    <h5 style="text-align:center">No albums yet</h5>

    @else
    <table class="table table-striped" style="vertical-align: middle;">


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
                            View
                        </button>
                    </a>
                </td>
                @auth
                @if (Auth::user()->user_type==\App\Models\User::ADMIN)

                <td>
                    <a href="{{ route('deleteAlbum',$item->id) }}">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </td>
                @endif
                @endauth


            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // When the edit button is clicked
        $('#editButton').on('click', function() {
            // Toggle visibility of the album edit form
            $('#bandEdit').toggle();
        });
    });

</script>

@endsection
