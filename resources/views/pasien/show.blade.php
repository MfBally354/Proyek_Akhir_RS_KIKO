<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pasien - {{ $pasien->nama_pasien }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .detail-card { max-width: 800px; margin: 40px auto; background: white; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); overflow: hidden; }
        .detail-header { background: #1565c0; color: white; padding: 30px; text-align: center; }
        .detail-body { padding: 40px; display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
        .detail-item { margin-bottom: 10px; }
        .label { font-size: 13px; color: #888; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 5px; }
        .value { font-size: 18px; color: #333; font-weight: 500; border-bottom: 1px solid #eee; padding-bottom: 5px; display: block;}
        .full-width { grid-column: span 2; }
        .badge { padding: 5px 15px; border-radius: 20px; font-size: 14px; background: white; color: #1565c0; font-weight: bold; display: inline-block; margin-top: 10px;}
        .btn-back { display: block; width: 100%; padding: 15px; text-align: center; background: #f5f5f5; color: #555; text-decoration: none; font-weight: bold; border-top: 1px solid #eee; }
        .btn-back:hover { background: #e0e0e0; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="detail-card">
        <div class="detail-header">
            <i class="fa-solid fa-hospital-user" style="font-size: 50px; margin-bottom: 10px;"></i>
            <h2>{{ $pasien->nama_pasien }}</h2>
            <div class="badge">{{ $pasien->nomor_rm }}</div>
        </div>

        <div class="detail-body">
            
            <div class="detail-item">
                <span class="label">NIK</span>
                <span class="value">{{ $pasien->nik ?? '-' }}</span>
            </div>

            <div class="detail-item">
                <span class="label">Jenis Kelamin</span>
                <span class="value">{{ $pasien->jenis_kelamin }}</span>
            </div>

            <div class="detail-item">
                <span class="label">Tanggal Lahir / Usia</span>
                {{-- Menampilkan Tanggal Lahir dan Usia otomatis --}}
                <span class="value">{{ \Carbon\Carbon::parse($pasien->tgl_lahir)->format('d F Y') }} ({{ $pasien->usia }})</span>
            </div>

            <div class="detail-item">
                <span class="label">Golongan Darah</span>
                <span class="value">{{ $pasien->golongan_darah ?? '-' }}</span>
            </div>

            <div class="detail-item full-width">
                <span class="label">Alamat</span>
                <span class="value">{{ $pasien->alamat }}</span>
            </div>

            <div class="detail-item full-width">
                <span class="label"><i class="fa-solid fa-notes-medical"></i> Riwayat Penyakit</span>
                <span class="value" style="color: #d32f2f;">{{ $pasien->riwayat_penyakit ?? 'Tidak ada data' }}</span>
            </div>

            <div class="detail-item full-width">
                <span class="label"><i class="fa-solid fa-triangle-exclamation"></i> Riwayat Alergi</span>
                <span class="value" style="color: #e65100;">{{ $pasien->riwayat_alergi ?? 'Tidak ada data' }}</span>
            </div>

            <div class="detail-item">
                <span class="label">Nomor BPJS</span>
                <span class="value">{{ $pasien->no_bpjs ?? '-' }}</span>
            </div>

        </div>

        <a href="{{ route('pasien.index') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Pasien
        </a>
    </div>

</body>
</html>