@extends('layouts.app')

@section('content')
<div class="container">
    <section class="mt-5">
        <h2 class="mb-3">Editar {{ $book->titulo }}</h2>

        <form action="{{ route('books.update',$book->id) }}" method="POST" class="needs-validation" novalidate>
            @method('PUT')
            @csrf

            <div class="form-group mb-3">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ $book->titulo }}" id="titulo">
                @error('titulo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="autor">Autor</label>
                <input type="text" class="form-control @error('autor') is-invalid @enderror" name="autor" value="{{ $book->autor }}" id="autor">
                @error('autor')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="genero">Genero</label>
                <input type="text" class="form-control @error('genero') is-invalid @enderror" name="genero" value="{{ $book->genero }}" id="genero">
                @error('genero')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="ano_de_publicacion">Año de publicación</label>
                <input type="text" class="form-control @error('ano_de_publicacion') is-invalid @enderror" name="ano_de_publicacion" value="{{ $book->ano_de_publicacion }}" id="ano_de_publicacion">
                @error('ano_de_publicacion')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="portada">Portada</label>
                <input type="file" class="form-control-file @error('portada') is-invalid @enderror" name="portada" id="portada">
                @error('portada')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </section>
</div>
@endsection