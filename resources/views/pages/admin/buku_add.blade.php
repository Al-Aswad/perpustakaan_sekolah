@extends('layouts.admin')

@section('content')
<div class="container">
    <h5>Form Tambah Buku</h5>
    <form method="POST" action="{{ route('buku-save') }}">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" class="form-control" name="name" placeholder="Judul buku">
                </div>
            </div>
            <div class="col">
                <label>Pengarang</label>
                <select id="inputState" class="form-control" name="pengarang">
                    <option selected>Pilih pengarang</option>
                    <option>Aswad</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Penerbit</label>
                    <select id="inputState" class="form-control" name="pengarang">
                        <option selected>Pilih penerbit</option>
                        <option>Aswad</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label>Tahun</label>
                <input type="year" class="form-control" placeholder="2022" name="year">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" placeholder="0" name="total">
                </div>
            </div>
        </div>
        <center>
            <button type="submit" class="mt-3 btn btn-primary">Simpan</button>
        </center>
    </form>
</div>
@endsection