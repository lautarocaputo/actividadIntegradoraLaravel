@extends('layouts._partials.header')

<body>

    <div class="d-flex flex-column min-vh-100">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container" style="margin-left:0;">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.create') }}">Agregar libro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.profile') }}">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.logout') }}">Cerrar sesión</a>
                    </li>
                </ul>

                <form class="d-flex ms-auto me-0" role="search" action=" {{ route('books.search') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Buscar libro" aria-label="Search"
                        name="query">
                    <button class="btn btn-outline-primary" type="submit">Buscar</button>
                </form>
            </div>
        </nav>


<body>
    

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="mb-auto">
        @include('layouts._partials.messages')
        @yield('content')
    </main>

</body>

    @extends('layouts._partials.footer')

</div>  
