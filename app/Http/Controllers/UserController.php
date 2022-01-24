<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $items['title'] = "Dashboard";
        $items['books'] = Book::with(['penerbit', 'pengarang'])
            ->orderBy('id', 'asc')
            ->get();
        return view('pages.user.home', $items);
    }

    public function pinjam($id)
    {
        dd($id);
    }
}
