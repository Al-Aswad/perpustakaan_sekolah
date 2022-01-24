<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManajemenController extends Controller
{
    public function index()
    {
        $items['title'] = "Users Manajemen";
        $items['users'] = DB::table('users')->get();
        return view('pages.admin.user', $items);
    }

    public function add()
    {
        return view('pages.admin.user_add');
    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect('penerbit-add')
                ->withErrors($validator)
                ->withInput();
        }
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->name;
        $user->roles = "USER";
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('pengguna')->with('status', 'Pengguna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $items['title'] = "Edit Pengguna";
        $items['user'] = DB::table('users')->find($id);

        return view('pages.admin.user_edit', $items);
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = User::findOrFail($request->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('pengguna')->with('status', 'Pengguna berhasil update!');
    }

    public function reset($id)
    {
        $type = User::findOrFail($id);

        $type->update([
            'password' => Hash::make("12345678")
        ]);

        return redirect('pengguna')->with('status', 'Password Di reset menjadi "12345678"!');
    }

    public function delete($id)
    {
        $delete = User::where('id', $id)->delete();

        return redirect('penerbit')->with('status', 'Penerbit berhasil dihapus!');
    }
}
