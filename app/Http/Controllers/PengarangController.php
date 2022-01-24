<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PengarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $items['title'] = "Daftar Pengarang";
        $items['pengarang'] = DB::table('pengarang')->get();
        return view('pages.admin.pengarang', $items);
    }
    public function add()
    {
        return view('pages.admin.pengarang_add');
    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return redirect('pengarang-add')
                ->withErrors($validator)
                ->withInput();
        }

        $pengarang = new Pengarang;

        $pengarang->name = $request->name;

        $pengarang->save();

        return redirect('pengarang')->with('status', 'Pengarang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $items['title'] = "Edit Pengarang";
        $items['pengarang'] = DB::table('pengarang')->find($id);

        return view('pages.admin.pengarang_edit', $items);
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3'
        ]);

        $type = Pengarang::findOrFail($request->id);

        $type->update([
            'name' => $request->name,
        ]);

        return redirect('pengarang')->with('status', 'Pengarang berhasil update!');
    }

    public function delete($id)
    {
        $delete = Pengarang::where('id', $id)->delete();

        return redirect('pengarang')->with('status', 'Pengarang berhasil dihapus!');
    }
}
