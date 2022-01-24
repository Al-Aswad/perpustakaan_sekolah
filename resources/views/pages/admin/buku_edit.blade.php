@extends('layouts.admin')

@section('content')
<div class="container">



    <div class="card">
        <div class="card-header">{{ __('Form Edit Buku') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('buku-update') }}">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input name="id" type="hidden" value="<?= $buku->id ;?>" required>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Judul buku" value="<?= old('name') ? old('name')  : $buku->name ?>">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>Pengarang</label>
                        <select id="inputState" class="form-control @error('pengarang_id') is-invalid @enderror"
                            name="pengarang_id" required>
                            <option value="">Pilih pengarang</option>
                            @foreach ($pengarang as $item)
                            <option <?=$buku->pengarang_id==$item->id ? "selected" : "" ;?> value="{{ $item->id }}">{{
                                $item->name }}</option>
                            @endforeach
                        </select>
                        @error('pengarang_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Penerbit</label>
                            <select id="inputState" class="form-control @error('penerbit_id') is-invalid @enderror"
                                name="penerbit_id" required>
                                <option value="">Pilih penerbit</option>
                                @foreach ($penerbit as $item)
                                <option <?=$buku->penerbit_id==$item->id ? "selected" : "" ;?> value="{{
                                    $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('penerbit_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>Tahun</label>
                        <input type="year" class="form-control @error('year') is-invalid @enderror" placeholder="2022"
                            name="year" value="<?= old('year') ? old('year') : $buku->tahun ;?>">
                        @error('year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control @error('total') is-invalid @enderror"
                                placeholder="0" name="total" value="<?= $buku->total ;?>">
                            @error('total')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <center>
                    <button type="submit" class="mt-3 btn btn-primary">Simpan</button>
                </center>
            </form>
        </div>
    </div>
</div>
</div>
@endsection