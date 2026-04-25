<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = \App\Models\Book::all();
        return view('dashboard', compact('books'));
    }

    public function store(Request $request) {
        Book::create($request->all());
        return redirect('/dashboard')->with('success', 'Buku ditambah!');
    }

    public function destroy($id) {
        \Illuminate\Support\Facades\DB::table('books')->where('id', $id)->delete();        
        return redirect('/dashboard')->with('success', 'Data buku berhasil dihapus!');
    }
}
