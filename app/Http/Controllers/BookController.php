<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = \App\Models\Book::all(); // Mengambil semua data buku
        return view('books.index', compact('books'));
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books',
            'stock' => 'required|numeric'
        ]);

        \App\Models\Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id) {
        $book = \App\Models\Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'stock' => 'required|numeric'
        ]);

        $book = \App\Models\Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy($id) {
        $book = \App\Models\Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
