@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <a href="{{ route('pengguna-add') }}" class="btn btn-primary">Tambah User</a>
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>

            @foreach ($users as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->roles }}</td>
                <td>
                    <a class="btn btn-danger" href="{{ route('pengguna-edit', ['id'=>$item->id]) }}">Edit</a>
                    <a class="btn btn-warning" href="{{ route('pengguna-hapus', ['id'=>$item->id]) }}"
                        onclick="return confirm('Yakin akan Menghapus data ?')">Hapus</a>
                    <a class="btn btn-primary" href="{{ route('pengguna-reset', ['id'=>$item->id]) }}"
                        onclick="return confirm('Password akan di reset menjadi 12345678 ?')">Reset
                        Password</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection