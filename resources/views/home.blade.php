@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        {{ __('You are logged in!') }}
    </div>

</div>
<div class="container">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>

            @foreach ($transaksi as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name_peminjam }}</td>
                <td>{{ $item->nama_buku }}</td>
                <td>{{ $item->pinjam }}</td>
                <td>{{ $item->kembali }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    @if ($item->status=="DIPINJAM")
                    <a class="btn btn-success" href="{{ route('dikembalikan', ['id'=>$item->id]) }}">Dikembalikan</a>
                    @else
                    <a class="btn btn-danger" href="{{ route('dipinjam', ['id'=>$item->id]) }}">Batal</a>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection