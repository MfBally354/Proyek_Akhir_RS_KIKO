<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pasien</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .form-container { max-width: 800px; margin: 40px auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .full-width { grid-column: span 2; }
        .form-group { margin-bottom: 20px; }
        .form-label { font-weight: bold; color: #555; display: block; margin-bottom: 8px; }
        .form-input, .form-select, .form-textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; }
        .section-title { color: #ffa000; border-bottom: 2px solid #ffecb3; padding-bottom: 10px; margin-bottom: 20px; font-size: 18px; font-weight: bold; grid-column: span 2; margin-top: 20px;}
        .btn-submit { background: #ffa000; color: white; padding: 15px; width: 100%; border: none; border-radius: 10px; font-weight: bold; font-size: 16px; cursor: pointer; margin-top: 20px; }
        .btn-submit:hover { background: #ff8f00; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="form-container">
        <h2 style="text-align:center; color:#333; margin-bottom:30px;">Edit Data Pasien</h2>

        <form action="{{ route('pasien.update', $pasien->id_pasien) }}" method="POST">
            @csrf
            @method('PUT') {{-- Method PUT Wajib untuk Update Data --}}
            
            <div class="form-grid">
                
                {{-- Data Diri --}}
                <div class="section-title"><i class="fa-solid fa-user-pen"></i> Edit Data Pribadi</div>

                <div class="form-group">
                    <label class="form-label">Nomor Rekam Medis</label>
                    <input type="text" class="form-input" value="{{ $pasien->nomor_rm }}" readonly style="background:#f5f5f5; color:#777;">
                </div>

                <div class="form-group">
                    <label class="form-label">NIK (KTP)</label>
                    <input type="number" name="nik" class="form-input" value="{{ $pasien->nik }}">
                </div>

                <div class="form-group full-width">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_pasien" class="form-input" value="{{ $pasien->nama_pasien }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-input" value="{{ $pasien->tgl_lahir }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="Laki-laki" {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $pasien->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="form-group full-width">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-textarea" rows="2" required>{{ $pasien->alamat }}</textarea>
                </div>

                {{-- Data Kesehatan --}}
                <div class="section-title"><i class="fa-solid fa-heart-pulse"></i> Edit Data Kesehatan</div>

                <div class="form-group">
                    <label class="form-label">Golongan Darah</label>
                    <select name="golongan_darah" class="form-select">
                        <option value="">-- Tidak Tahu --</option>
                        <option value="A" {{ $pasien->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $pasien->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                        <option value="AB" {{ $pasien->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="O" {{ $pasien->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor BPJS</label>
                    <input type="text" name="no_bpjs" class="form-input" value="{{ $pasien->no_bpjs }}">
                </div>

                <div class="form-group full-width">
                    <label class="form-label">Riwayat Penyakit Terdahulu</label>
                    <textarea name="riwayat_penyakit" class="form-textarea" rows="2">{{ $pasien->riwayat_penyakit }}</textarea>
                </div>

                <div class="form-group full-width">
                    <label class="form-label">Riwayat Alergi</label>
                    <textarea name="riwayat_alergi" class="form-textarea" rows="2">{{ $pasien->riwayat_alergi }}</textarea>
                </div>

            </div>

            <button type="submit" class="btn-submit">UPDATE DATA</button>
            <a href="{{ route('pasien.index') }}" style="display:block; text-align:center; margin-top:15px; color:#666; text-decoration:none;">Batal</a>

        </form>
    </div>

</body>
</html>