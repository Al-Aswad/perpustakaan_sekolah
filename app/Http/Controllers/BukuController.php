<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items['title'] = "Dashboard";
        $items['books'] = Book::with(['penerbit', 'pengarang'])
            ->orderBy('id', 'asc')
            ->get();
        return view('pages.admin.buku', $items);
    }
    public function add()
    {
        $items['pengarang'] = DB::table('pengarang')->get();
        $items['penerbit'] = DB::table('penerbit')->get();

        return view('pages.admin.buku_add', $items);
    }

    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
            'year' => 'required',
            'total' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect('buku-add')
                ->withErrors($validator)
                ->withInput();
        }

        $book = new Book;

        $book->name = $request->name;
        $book->pengarang_id = $request->pengarang_id;
        $book->penerbit_id = $request->penerbit_id;
        $book->tahun = $request->year;
        $book->total = $request->total;

        $book->save();

        return redirect('buku')->with('status', 'book berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $items['title'] = "Edit Buku";
        $items['buku'] = DB::table('books')->find($id);
        // dd($items['buku']);
        $items['pengarang'] = DB::table('pengarang')->get();
        $items['penerbit'] = DB::table('penerbit')->get();

        return view('pages.admin.buku_edit', $items);
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
            'year' => 'required',
            'total' => 'required',
        ]);

        if ($validator) {
            $boku = Book::findOrFail($request->id);

            $boku->update([
                'name' => $request->name,
                'pengarang_id' => $request->pengarang_id,
                'penerbit_id' => $request->penerbit_id,
                'tahun' => $request->year,
                'total' => $request->total
            ]);

            return redirect('buku')->with('status', 'Buku berhasil update!');
        }
        return redirect('buku')->with('status', 'Buku berhasil update!');
    }

    public function delete($id)
    {
        $delete = Book::where('id', $id)->delete();

        return redirect('buku')->with('status', 'Buku berhasil dihapus!');
    }
}
