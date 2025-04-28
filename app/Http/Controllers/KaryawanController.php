<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::paginate(10);
        return view('Karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('Karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email',
            'nomor_telepon' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'durasi_kontrak' => 'required|integer',
            'status' => 'required|in:aktif,tidak aktif,selesai',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('Karyawan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Karyawan $karyawan)
    {
        return view('Karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email,' . $karyawan->id,
            'nomor_telepon' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'durasi_kontrak' => 'required|integer',
            'status' => 'required|in:aktif,tidak aktif,selesai',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('Karyawan.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('Karyawan.index')->with('success', 'Data berhasil dihapus.');
    }

    public function deleted()
    {
        $karyawans = Karyawan::onlyTrashed()->paginate(10);
        return view('Karyawan.deleted', compact('karyawans'));
    }
    
    // Add new methods for restore and force delete
    public function restore($id)
    {
        $karyawan = Karyawan::onlyTrashed()->findOrFail($id);
        $karyawan->restore();
        
        return redirect()->route('Karyawan.deleted')
            ->with('success', 'Data karyawan berhasil dipulihkan.');
    }
    
    public function forceDelete($id)
    {
        $karyawan = Karyawan::onlyTrashed()->findOrFail($id);
        $karyawan->forceDelete();
        
        return redirect()->route('Karyawan.deleted')
            ->with('success', 'Data karyawan berhasil dihapus permanen.');
    }
}
