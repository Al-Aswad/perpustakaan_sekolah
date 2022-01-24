@extends('layouts.user')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        {{-- <a href="{{ route('buku-add') }}" class="btn btn-primary">Tambah Buku</a> --}}
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>

            @foreach ($books as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->pengarang->name }}</td>
                <td>{{ $item->penerbit->name }}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{ $item->total }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('user-pinjam', ['id'=>$item->id]) }}">Pinjam</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection