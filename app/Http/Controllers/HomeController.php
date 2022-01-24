<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items['title'] = "Dashboard";
        // $items['transaksi'] = Transaksi::with(['buku', 'user'])
        //     // ->orderBy('id', 'asc')
        //     ->get();
        $items['transaksi'] = DB::select('SELECT t.*, u.name as name_peminjam, b.name as nama_buku FROM `transaksi` as t INNER JOIN books as b ON t.book_id=b.id INNER JOIN users as u ON t.user_id=u.id');
        // dd($items['transaksi']);
        return view('home', $items);
    }

    public function dikembalikan($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'status' => "DIKEMBALIKAN"
        ]);

        return redirect('home')->with('status', 'Buku berhasil dikembalikan!');
    }
    public function dipinjam($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'status' => "DIPINJAM"
        ]);

        return redirect('home')->with('status', 'Buku batal dikembalikan!');
    }
}
