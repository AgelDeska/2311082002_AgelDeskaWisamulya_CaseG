<div class="mb-3">
    <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
    <input type="text" class="form-control" name="nama_karyawan" value="{{ old('nama_karyawan', $karyawan->nama_karyawan ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="bidang_keahlian" class="form-label">Bidang Keahlian</label>
    <input type="text" class="form-control" name="bidang_keahlian" value="{{ old('bidang_keahlian', $karyawan->bidang_keahlian ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value="{{ old('email', $karyawan->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
    <input type="text" class="form-control" name="nomor_telepon" value="{{ old('nomor_telepon', $karyawan->nomor_telepon ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
    <input type="date" class="form-control" name="tanggal_mulai" value="{{ old('tanggal_mulai', $karyawan->tanggal_mulai ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="durasi_kontrak" class="form-label">Durasi Kontrak (bulan)</label>
    <input type="number" class="form-control" name="durasi_kontrak" value="{{ old('durasi_kontrak', $karyawan->durasi_kontrak ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-control" required>
        <option value="aktif" {{ (old('status', $karyawan->status ?? '') == 'aktif') ? 'selected' : '' }}>Aktif</option>
        <option value="tidak aktif" {{ (old('status', $karyawan->status ?? '') == 'tidak aktif') ? 'selected' : '' }}>Tidak Aktif</option>
        <option value="selesai" {{ (old('status', $karyawan->status ?? '') == 'selesai') ? 'selected' : '' }}>Selesai</option>
    </select>
</div>
