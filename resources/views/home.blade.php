@extends('layouts.frontOffice')

@section('content')



<div class="container">
    <ul>
        <a href="{{route('allUsers')}}">
            <li>Todos os utilizadores</li>
        </a>
    </ul>
    <ul>
        <a href="{{route('addUser')}}">
            <li>Adicionar utilizador</li>
        </a>
    </ul>

    {{-- no fim de criar o login o utilizador ve o seu perfil por aqui --}}
    {{-- <ul>
        <a href="{{route('viewUser')}}">
    <li>Perfil de utilizador</li>
    </a>
    </ul> --}}

    <ul>
        <a href="{{route('allBands')}}">
            <li>Todas as Bandas</li>
        </a>
    </ul>

</div>

@endsection
