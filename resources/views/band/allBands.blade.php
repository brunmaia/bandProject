@extends('layouts.frontOffice')

@section('content')
</div>
@auth


<div class="container">


    @endauth
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
        @if (Auth::user()->user_type==\App\Models\User::ADMIN)
        <a href="{{route('addBand')}}">
            <button type="button" class="btn btn-success">Add Band</button>
        </a>
        @endif

        @if($bandsWithCounts->isEmpty())
        <h5 style="text-align:center">No Bands yet</h5>

        @else


        <table class="table table-striped" style="text-align: center; vertical-align: middle;">



            <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Band Name</th>
                    <th scope="col">Albums Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bandsWithCounts as $item)
                <tr>
                    <td><img width="30px" height="30px" src="{{$item->photo ? asset('storage/'.$item->photo):asset('storage/images/noPhoto.png')}}"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->albums_count}}</td>
                    <td>
                        <a href="{{ route('viewBand',$item ->id) }}">
                            <button class="btn btn-warning">
                                View Band
                            </button>
                        </a>
                    </td>
                    @auth
                    @if (Auth::user()->user_type==\App\Models\User::ADMIN)

                    <td>
                        <a href="{{ route('deleteBand',$item ->id) }}">
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
        <div class=""><a href="{{route('home')}}">Voltar</a></div>

    </div>
</div>



@endsection
