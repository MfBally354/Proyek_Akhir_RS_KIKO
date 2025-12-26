<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Dokter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .detail-card { max-width: 800px; margin: 40px auto; background: white; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); overflow: hidden; }
        .detail-header { background: #1565c0; color: white; padding: 40px; text-align: center; }
        .detail-body { padding: 40px; }
        .info-row { display: flex; justify-content: space-between; border-bottom: 1px solid #eee; padding: 15px 0; }
        .info-label { color: #666; font-weight: bold; }
        .info-value { color: #333; font-weight: 600; }
        
        .schedule-box { background: #f5f5f5; border-radius: 10px; padding: 20px; margin-top: 30px; }
        .schedule-title { font-weight: bold; margin-bottom: 15px; color: #1565c0; font-size: 18px; border-bottom: 2px solid #1565c0; display: inline-block; padding-bottom: 5px; }
        .schedule-item { display: flex; justify-content: space-between; margin-bottom: 10px; background: white; padding: 10px 15px; border-radius: 5px; border-left: 4px solid #1565c0; }
        
        .btn-back { display: block; width: 100%; padding: 15px; text-align: center; background: #f5f5f5; color: #555; text-decoration: none; font-weight: bold; border-top: 1px solid #eee; }
        .btn-back:hover { background: #e0e0e0; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="detail-card">
        <div class="detail-header">
            <i class="fa-solid fa-user-doctor" style="font-size: 60px; margin-bottom: 15px;"></i>
            <h2>{{ $dokter->nama_dokter }}</h2>
            <p>{{ $dokter->spesialisasi }}</p>
        </div>

        <div class="detail-body">
            
            <div class="info-row">
                <span class="info-label">Poliklinik</span>
                <span class="info-value">{{ $dokter->poli->nama_poli ?? '-' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Nomor Kontak</span>
                <span class="info-value">{{ $dokter->kontak ?? '-' }}</span>
            </div>

            {{-- Bagian Jadwal Praktik --}}
            <div class="schedule-box">
                <div class="schedule-title"><i class="fa-solid fa-calendar-days"></i> Jadwal Praktik</div>
                
                @forelse($dokter->jadwal as $j)
                    <div class="schedule-item">
                        <span>{{ $j->hari }}</span>
                        <span>{{ $j->jam_mulai }} - {{ $j->jam_selesai }} WIB</span>
                    </div>
                @empty
                    <p style="color:gray; text-align:center;">Belum ada jadwal praktik.</p>
                @endforelse
            </div>

        </div>

        <a href="{{ route('dokter.index') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Dokter
        </a>
    </div>

</body>
</html>