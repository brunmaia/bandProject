@extends('layouts.frontOffice')

@section('content')



<div class="container">

    @auth
    @if (Auth::user()->user_type==\App\Models\User::ADMIN)

    <ul>
        <a href="{{route('allUsers')}}">
            <li>Todos os utilizadores</li>
        </a>
    </ul>
    @endif

    <ul>
        <a href="{{route('viewUser',Auth::user()->id)}}">
            <li>Perfil de utilizador</li>
        </a>
    </ul>
    @endauth

    <ul>
        <a href="{{route('addUser')}}">
            <li>Adicionar utilizador</li>
        </a>
    </ul>

    <ul>
        <a href="{{route('allBands')}}">
            <li>Todas as Bandas</li>
        </a>
    </ul>

</div>

@endsection
