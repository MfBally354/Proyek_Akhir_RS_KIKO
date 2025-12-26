<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pasien</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .form-container { max-width: 800px; margin: 40px auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .full-width { grid-column: span 2; }
        .form-group { margin-bottom: 20px; }
        .form-label { font-weight: bold; color: #555; display: block; margin-bottom: 8px; }
        .form-input, .form-select, .form-textarea {
            width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px;
        }
        .section-title { color: #1565c0; border-bottom: 2px solid #e3f2fd; padding-bottom: 10px; margin-bottom: 20px; font-size: 18px; font-weight: bold; grid-column: span 2; margin-top: 20px;}
        .btn-submit { background: #1565c0; color: white; padding: 15px; width: 100%; border: none; border-radius: 10px; font-weight: bold; font-size: 16px; cursor: pointer; margin-top: 20px; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="form-container">
        <h2 style="text-align:center; color:#333; margin-bottom:30px;">Formulir Pasien Baru</h2>

        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf
            
            <div class="form-grid">
                
                {{-- Data Diri --}}
                <div class="section-title"><i class="fa-solid fa-user"></i> Data Pribadi</div>

                <div class="form-group">
                    <label class="form-label">Nomor Rekam Medis (Otomatis)</label>
                    <input type="text" name="nomor_rm" class="form-input" value="{{ $nomor_rm_otomatis }}" readonly style="background:#f5f5f5; color:#777;">
                </div>

                <div class="form-group">
                    <label class="form-label">NIK (KTP)</label>
                    <input type="number" name="nik" class="form-input" placeholder="Masukkan NIK">
                </div>

                <div class="form-group full-width">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_pasien" class="form-input" required placeholder="Nama sesuai KTP">
                </div>

                <div class="form-group">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group full-width">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-textarea" rows="2" required placeholder="Jalan, RT/RW, Kelurahan, Kecamatan..."></textarea>
                </div>

                {{-- Data Kesehatan --}}
                <div class="section-title"><i class="fa-solid fa-heart-pulse"></i> Data Kesehatan Awal</div>

                <div class="form-group">
                    <label class="form-label">Golongan Darah</label>
                    <select name="golongan_darah" class="form-select">
                        <option value="">-- Tidak Tahu --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor BPJS (Opsional)</label>
                    <input type="text" name="no_bpjs" class="form-input" placeholder="Nomor Kartu BPJS">
                </div>

                <div class="form-group full-width">
                    <label class="form-label">Riwayat Penyakit Terdahulu (Kronis)</label>
                    <textarea name="riwayat_penyakit" class="form-textarea" rows="2" placeholder="Contoh: Diabetes, Hipertensi, Asma... (Kosongkan jika tidak ada)"></textarea>
                </div>

                <div class="form-group full-width">
                    <label class="form-label">Riwayat Alergi</label>
                    <textarea name="riwayat_alergi" class="form-textarea" rows="2" placeholder="Contoh: Alergi Seafood, Alergi Antibiotik..."></textarea>
                </div>

            </div>

            <button type="submit" class="btn-submit">SIMPAN DATA PASIEN</button>
            <a href="{{ route('pasien.index') }}" style="display:block; text-align:center; margin-top:15px; color:#666; text-decoration:none;">Batal</a>

        </form>
    </div>

</body>
</html>