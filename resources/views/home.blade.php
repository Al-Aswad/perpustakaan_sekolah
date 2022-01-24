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
<div class="container-fluid">

</div>
@endsection