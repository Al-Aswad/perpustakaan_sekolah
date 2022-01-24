<?php

namespace App\Http\Controllers;

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
        $items['accounts_type'] = DB::table('buku')->get();
        return view('pages.admin.buku', $items);
    }
    public function add()
    {
        return view('pages.admin.buku_add');
    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'total' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect('buku-add')
                ->withErrors($validator)
                ->withInput();
        }
        // dd(request($request->all()));
    }
}
