@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data Karyawan</h1>

    <form action="{{ route('Karyawan.store') }}" method="POST">
        @csrf

        @include('karyawan.form')

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('Karyawan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
