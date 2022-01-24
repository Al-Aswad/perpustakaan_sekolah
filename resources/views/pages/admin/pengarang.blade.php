@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Pengarang</h1>
        <a href="{{ route('pengarang-add') }}" class="btn btn-primary">Tambah Pengarang</a>
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>

            @foreach ($pengarang as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a class="btn btn-danger" href="{{ route('pengarang-edit', ['id'=>$item->id]) }}">Edit</a>
                    <a class="btn btn-warning" href="{{ route('pengarang-hapus', ['id'=>$item->id]) }}">Hapus</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection