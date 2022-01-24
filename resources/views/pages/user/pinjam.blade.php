@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Form Peminjaman Buku') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user-pinjam-save') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Judul Buku') }}</label>
                            <div class="col-md-6">
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <input id="name" type="text" class="form-control" value="{{ $book->name }}"
                                    autocomplete="name" placeholder="Nama penerbit" readonly>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Pengarang') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" value="{{ $book->pengarang->name }}"
                                    autocomplete="name" placeholder="Nama penerbit" readonly>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Penerbit') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" value="{{ $book->penerbit->name }}"
                                    autocomplete="name" placeholder="Nama penerbit" readonly>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Pinjam') }}</label>
                            <div class="col-md-6">
                                <input type="date" name="pinjam" class="form-control"
                                    value="{{ $book->penerbit->name }}" autocomplete="name" placeholder="Nama penerbit"
                                    required>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Kembali') }}</label>
                            <div class="col-md-6">
                                <input type="date" name="kembali" class="form-control"
                                    value="{{ $book->penerbit->name }}" autocomplete="name" placeholder="Nama penerbit"
                                    required>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Total') }}</label>
                            <div class="col-md-6">
                                <input type="number" name="total" class="form-control" value="" autocomplete="name"
                                    placeholder="0" required>

                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pinjam') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection