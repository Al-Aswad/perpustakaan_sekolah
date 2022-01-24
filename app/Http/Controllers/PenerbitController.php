<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items['title'] = "Daftar Penerbit";
        $items['penerbit'] = DB::table('penerbit')->get();
        return view('pages.admin.penerbit', $items);
    }
    public function add()
    {
        return view('pages.admin.penerbit_add');
    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3'
        ]);



        if ($validator->fails()) {
            return redirect('penerbit-add')
                ->withErrors($validator)
                ->withInput();
        }
        $pengarang = new Penerbit;

        $pengarang->name = $request->name;

        $pengarang->save();

        return redirect('penerbit')->with('status', 'Pengarang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $items['title'] = "Edit Penerbit";
        $items['penerbit'] = DB::table('penerbit')->find($id);

        return view('pages.admin.penerbit_edit', $items);
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3'
        ]);

        $type = Penerbit::findOrFail($request->id);

        $type->update([
            'name' => $request->name,
        ]);

        return redirect('penerbit')->with('status', 'Penerbit berhasil update!');
    }

    public function delete($id)
    {
        $delete = Penerbit::where('id', $id)->delete();

        return redirect('penerbit')->with('status', 'Penerbit berhasil dihapus!');
    }
}
