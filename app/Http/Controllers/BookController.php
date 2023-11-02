<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        $imageUrl = url('/images/' . $book->portada);
        return view('books.show', compact('book', 'imageUrl'));
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(BookRequest $request): RedirectResponse
    {
        $file = $request->file('portada');
        $portada = time() . $file->getClientOriginalName();
        $file->move(public_path() . '/images/', $portada);

        $book = new Book();
        $book->titulo = $request->titulo;
        $book->autor = $request->autor;
        $book->genero = $request->genero;
        $book->ano_de_publicacion = $request->ano_de_publicacion;
        $book->portada = $portada;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Libro creado');
    }

    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        if ($request->hasFile('portada')) {
            $request->validate([
                'titulo' => 'required|max:255',
                'autor' => 'required|max:255',
                'genero' => 'required|max:255',
                'ano_de_publicacion' => 'required|max:255',
                'portada' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = $request->file('portada');
            $portada = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $portada);

            $book->portada = $portada;
            $book->update($request->all());
        } else {
            $request->validate([
                'titulo' => 'required|max:255',
                'autor' => 'required|max:255',
                'genero' => 'required|max:255',
                'ano_de_publicacion' => 'required|max:255',
            ]);
            $book->update($request->all());
        }

        return redirect()->route('books.index')->with('updated', 'Libro editado');;
    }

    public function destroy(Book $book): RedirectResponse
    {
        if ($book->portada) {
            if (file_exists(public_path() . '/images/' . $book->portada)) {
                unlink(public_path() . '/images/' . $book->portada);
            }
        }
        $book->delete();
        return redirect()->route('books.index')->with('danger', 'Libro borrado');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $books = Book::where('titulo', 'LIKE', "%{$query}%")->get();

        return view('books.index', compact('books'));
    }

}
