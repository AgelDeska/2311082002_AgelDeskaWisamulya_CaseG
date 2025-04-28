@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Karyawan Freelance</h1>
    <a href="{{ route('Karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>
    <a href="{{ route('Karyawan.deleted') }}" class="btn btn-warning mb-3">Data Karyawan Dihapus</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Bidang Keahlian</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Mulai</th>
                <th>Durasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $index => $karyawan)
            <tr>
                <td>{{ $karyawans->firstItem() + $index }}</td>
                <td>{{ $karyawan->nama_karyawan }}</td>
                <td>{{ $karyawan->bidang_keahlian }}</td>
                <td>{{ $karyawan->email }}</td>
                <td>{{ $karyawan->nomor_telepon }}</td>
                <td>{{ $karyawan->tanggal_mulai }}</td>
                <td>{{ $karyawan->durasi_kontrak }} bulan</td>
                <td>{{ ucfirst($karyawan->status) }}</td>
                <td>
                    <a href="{{ route('Karyawan.edit', $karyawan->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <form action="{{ route('Karyawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-4">
    {{ $karyawans->links('pagination::bootstrap-4') }}
</div>
</div>
@endsection
