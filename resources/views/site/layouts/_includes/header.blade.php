<link rel="stylesheet" href="{{ asset('css/header.css')}}">

<nav class="navbar navbar-expand-lg navbar-dark justify-content-end" style="background-color: #0a6b3a!important">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
            @if(Auth::check())
                <li class="nav-item dropdown float-right">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu header-dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item text-white" href="{{ route('moduloUsuario.gerenciar') }}">Gerenciar</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('signout') }}">Logout</a>
                </li>
            @else
                <li class="nav-item dropdown float-right">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        Módulo de Usuários
                    </a>
                    <div class="dropdown-menu header-dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item text-white" href="{{ route('moduloUsuario.gerenciar') }}">Gerenciar</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login.view') }}">Login</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
