@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Karyawan Dihapus</h1>

    <a href="{{ route('Karyawan.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Tanggal Dihapus</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $index => $karyawan)
            <tr>
                <td>{{ $karyawans->firstItem() + $index }}</td>
                <td>{{ $karyawan->nama_karyawan }}</td>
                <td>{{ $karyawan->email }}</td>
                <td>{{ ucfirst($karyawan->status) }}</td>
                <td>{{ $karyawan->deleted_at }}</td>
                <td>
                    <form action="{{ route('Karyawan.restore', $karyawan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">Restore</button>
                    </form>
                    
                    <form action="{{ route('Karyawan.forceDelete', $karyawan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus permanen?')">Delete Permanent</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        {{ $karyawans->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
