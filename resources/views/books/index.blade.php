@extends('layouts.app')

@section('content')
    <section class="libros-index">
        <h2 class="text-center" style="padding-top: 20px">Libros registrados</h2>

        <div class="row">
            @forelse ($books as $book)
            <div class="col-md-4" style="padding: 25px">
                <div class="card mb-4 border border-primary" style="transition: transform .2s;">
                    <img class="card-img-top mx-auto d-block" style="padding: 25px; max-width:400px; max-height:300px;" src="/images/{{ $book->portada }}"
                        alt="{{ $book->titulo }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title text-center " style="color: #333; font-size: 24px; padding-bottom:10px">{{ $book->titulo }}</h4>
            
                        <div class="btn-group d-grid gap-2" role="group" aria-label="Basic mixed styles example">
                            <a class="btn btn-success w-100" style="border-radius:1rem" href="{{ route('books.show', $book->id) }}">Ver</a>
                            <a class="btn btn-primary w-100" style="border-radius:1rem" href="{{ route('books.edit', $book->id) }}">Editar</a>
                            <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger w-100" value="Eliminar" style="border-radius:1rem">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @empty
                <p class="text-center">No se ha encontrado ningun libro.</p>
            @endforelse


    </section>
@endsection
