@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Karyawan</h1>

    <form action="{{ route('Karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('karyawan.form', ['karyawan' => $karyawan])

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('Karyawan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
