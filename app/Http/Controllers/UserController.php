<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        $items['book'] = Book::with(['penerbit', 'pengarang'])
            ->where('id', $id)
            ->first();
        // dd($items);
        return view('pages.user.pinjam', $items);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pinjam' => 'required',
            'kembali' => 'required'
        ]);

        $book = new Transaksi;

        $book->book_id = $request->book_id;
        $book->pinjam = $request->pinjam;
        $book->kembali = $request->kembali;
        $book->total = $request->total;
        $book->status = "DIPINJAM";
        $book->user_id = Auth::user()->id;

        $book->save();

        return redirect('user')->with('status', 'book berhasil ditambahkan!');
    }
}
