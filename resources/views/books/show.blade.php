@extends('layouts.app')

@section('content')
<div class="container">
    <section class="libro mt-5">
        <h1 class="mb-3">{{ $book->titulo }}</h1>
        <div class="card no-animation">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $imageUrl }}" class="card-img" alt="{{ $book->titulo }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->titulo }}</h5>
                        <p class="card-text"><strong>Autor:</strong> {{ $book->autor }}</p>
                        <p class="card-text"><strong>Editorial:</strong> {{ $book->editorial }}</p>
                        <p class="card-text"><strong>Fecha de publicación:</strong> {{ $book->ano_de_publicacion }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection