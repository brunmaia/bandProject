<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bandas e Albuns</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>
<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">Bandas de Musica</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('viewUser',Auth::user()->id)}}">User profile</a>
                    </li>

                    @if(Auth::user()->user_type==\App\Models\User::ADMIN)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('addBand')}}">Add Band</a>
                    </li>
                    @endif

                    @endauth

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('addUser')}}">Add User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('allBands')}}">All Bands</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li> --}}
                </ul>
            </div>
            @if (Route::has('login'))
            @auth
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">Hi there, {{Auth::user()->name}}</div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                <div class="container">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit">Logout</button>

                    </form>

                </div>

                @else
                <a href="{{ route('login') }}" class="">
                    <button class="btn btn-primary me-md-2" type="button">
                        Login
                    </button>
                </a>

                @if (Route::has('register'))
                <a href="{{ route('addUser') }}" class="">
                    <button class="btn btn-primary" type="button">
                        Register
                    </button>
                </a>
                @endif
                @endauth
            </div>
            @endif

        </div>
    </nav>
    {{-- end navbar --}}
    @yield('content')


    <script>
        // JavaScript function to adjust the height of the textarea dynamically
        function autoAdjustHeight(textarea) {
            textarea.style.height = 'auto'; // Reset the height to auto
            textarea.style.height = textarea.scrollHeight + 'px'; // Set the height to fit the content
        }

    </script>

</body>
</html>
