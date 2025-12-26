<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - RS KIKO</title>
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- 1. GLOBAL RESET --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body, html { width: 100%; overflow-x: hidden; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #ffffff; }

        /* --- 2. NAVBAR --- */
        nav { width: 100%; padding: 15px 5%; background: #e3f2fd; box-shadow: 0 4px 6px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center; }
        .nav-link { text-decoration: none; color: #333; font-weight: 700; font-size: 15px; transition: 0.3s; text-transform: uppercase; }
        .nav-link:hover { color: #1565c0; }
        .profile-badge { display: flex; align-items: center; gap: 10px; text-decoration: none; background: white; padding: 8px 20px; border-radius: 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); color: #1565c0; font-weight: bold; }

        /* --- 3. HERO SECTION --- */
        .hero-section { background-image: url('/img/hospital-bg.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100%; padding: 100px 20px 120px; text-align: center; color: white; position: relative; }
        .hero-overlay { position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.6); z-index: 1; }
        .hero-content { position: relative; z-index: 2; max-width: 800px; margin: 0 auto; }

        /* --- 4. SEARCH BAR --- */
        .search-container { position: relative; max-width: 700px; margin: 40px auto 0; width: 100%; }
        .search-input { width: 100%; height: 60px; padding: 10px 70px 10px 30px; font-size: 18px; border-radius: 50px; border: none; outline: none; box-shadow: 0 4px 15px rgba(0,0,0,0.3); }
        .search-btn { position: absolute; right: 5px; top: 5px; bottom: 5px; width: 50px; height: 50px; background: #1565c0; color: white; border: none; border-radius: 50%; cursor: pointer; font-size: 20px; display: flex; align-items: center; justify-content: center; transition: 0.3s; }
        .search-btn:hover { background: #0d47a1; }

        /* --- 5. MENU SECTION --- */
        .menu-section { background-color: #ffffff; padding: 60px 20px; width: 100%; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; max-width: 1000px; margin: 0 auto; }
        .menu-card { background: #f8f9fa; padding: 40px 20px; border-radius: 15px; text-align: center; text-decoration: none; color: #333; font-weight: bold; font-size: 18px; border: 1px solid #eee; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: 0.3s; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 220px; }
        .menu-card:hover { transform: translateY(-5px); background: #e3f2fd; border-color: #2196f3; color: #1565c0; box-shadow: 0 10px 20px rgba(21, 101, 192, 0.15); }
        .menu-card i { font-size: 55px; margin-bottom: 25px; color: #1565c0; }
        
        .menu-nurse { background: #f1f8e9; border: 1px solid #c8e6c9; }
        .menu-nurse i { color: #43a047; }
        .menu-nurse:hover { background: #e8f5e9; border-color: #43a047; color: #2e7d32; box-shadow: 0 10px 20px rgba(67, 160, 71, 0.2); }

        /* --- 6. HASIL PENCARIAN --- */
        .result-wrapper { background-color: #f5f5f5; padding: 40px 20px; border-bottom: 1px solid #eee; }
        .result-box { max-width: 1000px; margin: 0 auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid #eee; }

        /* --- 7. DASHBOARD STATISTIK (KHUSUS ADMIN) --- */
        .stats-container { max-width: 1000px; margin: 0 auto 50px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px; }
        .stats-group h3 { margin-bottom: 15px; color: #555; border-left: 5px solid #1565c0; padding-left: 10px; }
        .stats-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px; }
        .stat-card { background: white; border-radius: 10px; padding: 20px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eee; }
        .stat-number { font-size: 32px; font-weight: bold; color: #1565c0; display: block; margin-bottom: 5px; }
        .stat-label { font-size: 13px; color: #666; text-transform: uppercase; font-weight: bold; }
        
        /* Warna Label */
        .lbl-day { color: #43a047; } /* Hijau */
        .lbl-month { color: #fb8c00; } /* Oranye */
        .lbl-year { color: #e53935; } /* Merah */
    </style>
</head>
<body>

    <nav>
        <div style="font-weight:800; font-size:24px; color:#1565c0; display:flex; align-items:center; gap:10px;">
            <i class="fa-solid fa-square-h"></i> <span>MYMEDICAL</span>
        </div>
        <div style="display:flex; gap:30px;">
            <a href="{{ route('home') }}" class="nav-link">Beranda</a>
            <a href="{{ route('home') }}#menu-area" class="nav-link">Menu</a>
            <a href="#" class="nav-link">Pengaturan</a>
        </div>
        <div>
            @auth
                <a href="{{ route('profile') }}" class="profile-badge">
                    <i class="fa-solid fa-circle-user" style="font-size:24px;"></i>
                    <span>{{ Str::limit(Auth::user()->nama_lengkap, 15) }}</span>
                </a>
            @else
                <a href="{{ route('login') }}" style="background:#1565c0; color:white; padding:10px 25px; border-radius:30px; text-decoration:none; font-weight:bold;">Masuk</a>
            @endauth
        </div>
    </nav>

    <div class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            @auth
                <h1 style="font-size: 48px; margin-bottom: 10px; text-shadow: 0 2px 5px rgba(0,0,0,0.5);">
                    SELAMAT DATANG, {{ strtoupper(Auth::user()->nama_lengkap) }}
                </h1>
                <p style="font-size: 20px; background: rgba(255,255,255,0.2); display: inline-block; padding: 5px 20px; border-radius: 20px; backdrop-filter: blur(5px);">
                    Anda login sebagai: <strong>{{ Auth::user()->id_role == 1 ? 'ADMINISTRASI' : 'PERAWAT' }}</strong>
                </p>
            @else
                <h1 style="font-size: 48px; margin-bottom: 10px; text-shadow: 0 2px 5px rgba(0,0,0,0.5);">SELAMAT DATANG DI MYMEDICAL</h1>
                <p style="font-size: 20px; background: rgba(255,255,255,0.2); display: inline-block; padding: 5px 20px; border-radius: 20px; backdrop-filter: blur(5px);">Sistem Informasi Manajemen Rumah Sakit KIKO</p>
            @endauth

            <div class="search-container">
                <form action="{{ route('home') }}" method="GET">
                    <input type="text" name="keyword" class="search-input" 
                        placeholder="{{ Auth::check() ? 'Cari data pasien, dokter, atau staff...' : '⚠ Silakan Login untuk mencari data...' }}" 
                        value="{{ $keyword ?? '' }}">
                    <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </div>

    @if(isset($keyword) && $keyword != "")
        <div class="result-wrapper">
            <div class="result-box">
                <h3 style="margin-top:0; border-bottom:2px solid #eee; padding-bottom:10px;">Hasil Pencarian: "{{ $keyword }}"</h3>
                <table width="100%" border="0" cellpadding="15" cellspacing="0">
                    <tr style="background:#e3f2fd; text-align:left;"><th>Nama</th><th>Peran</th><th>Detail</th></tr>
                    @foreach($hasilUser as $u)
                    <tr style="border-bottom:1px solid #eee;">
                        <td><i class="fa-solid fa-user-tie" style="margin-right:5px;"></i> <strong>{{ $u->nama_lengkap }}</strong></td>
                        <td>{{ $u->id_role == 1 ? 'Admin IT' : 'Perawat' }}</td>
                        <td>{{ $u->email }}</td>
                    </tr>
                    @endforeach
                    @foreach($hasilDokter as $d)
                    <tr style="border-bottom:1px solid #eee;">
                        <td><i class="fa-solid fa-user-doctor" style="margin-right:5px;"></i> <strong>{{ $d->nama_dokter }}</strong></td>
                        <td>Dokter</td>
                        <td>{{ $d->spesialisasi }}</td>
                    </tr>
                    @endforeach
                    @foreach($hasilPasien as $p)
                    <tr style="border-bottom:1px solid #eee;">
                        <td><i class="fa-solid fa-hospital-user" style="margin-right:5px;"></i> <strong>{{ $p->nama_pasien }}</strong></td>
                        <td>Pasien</td>
                        <td>RM: {{ $p->nomor_rm }}</td>
                    </tr>
                    @endforeach
                    @if($hasilUser->isEmpty() && $hasilPasien->isEmpty() && $hasilDokter->isEmpty())
                    <tr><td colspan="3" style="text-align:center; color:red; padding:20px;">Data tidak ditemukan.</td></tr>
                    @endif
                </table>
                <div style="text-align:center; margin-top:20px;"><a href="{{ route('home') }}" style="color:#1565c0; font-weight:bold; text-decoration:none;">Reset Pencarian</a></div>
            </div>
        </div>
    @endif

    <div id="menu-area" class="menu-section">
        
        {{-- DASHBOARD STATISTIK (HANYA ADMIN) --}}
        @if(Auth::check() && Auth::user()->id_role == 1)
            <div class="stats-container">
                {{-- Statistik Pasien --}}
                <div class="stats-group">
                    <h3><i class="fa-solid fa-users-line"></i> Data Pasien Baru</h3>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <span class="stat-number">{{ $stats['pasien_hari'] }}</span>
                            <span class="stat-label lbl-day">Hari Ini</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">{{ $stats['pasien_bulan'] }}</span>
                            <span class="stat-label lbl-month">Bulan Ini</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">{{ $stats['pasien_tahun'] }}</span>
                            <span class="stat-label lbl-year">Tahun Ini</span>
                        </div>
                    </div>
                </div>

                {{-- Statistik Rekam Medis --}}
                <div class="stats-group">
                    <h3><i class="fa-solid fa-file-medical-alt"></i> Rekam Medis</h3>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <span class="stat-number">{{ $stats['rm_hari'] }}</span>
                            <span class="stat-label lbl-day">Hari Ini</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">{{ $stats['rm_bulan'] }}</span>
                            <span class="stat-label lbl-month">Bulan Ini</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">{{ $stats['rm_tahun'] }}</span>
                            <span class="stat-label lbl-year">Tahun Ini</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <h2 style="text-align:center; color:#333; margin-bottom: 40px; text-transform: uppercase; letter-spacing: 1px;">Menu Utama</h2>

        @auth
            <div class="menu-grid">
                @if(Auth::user()->id_role == 1)
                    <a href="{{ route('perawat.index') }}" class="menu-card"><i class="fa-solid fa-user-nurse"></i> <span>Kelola Data Perawat</span></a>
                    <a href="{{ route('dokter.index') }}" class="menu-card"><i class="fa-solid fa-user-doctor"></i> <span>Kelola Dokter</span></a>
                    <a href="{{ route('pasien.index') }}" class="menu-card"><i class="fa-solid fa-hospital-user"></i> <span>Kelola Data Pasien</span></a>
                    <a href="{{ route('jadwal.index') }}" class="menu-card"><i class="fa-solid fa-calendar-days"></i> <span>Kelola Jadwal</span></a>
                @endif

                @if(Auth::user()->id_role == 2)
                    <a href="{{ route('pasien.create') }}" class="menu-card menu-nurse"><i class="fa-solid fa-user-plus"></i> <span>Input Pasien Baru</span></a>
                    <a href="{{ route('pasien.index') }}" class="menu-card menu-nurse"><i class="fa-solid fa-file-medical"></i> <span>Input Rekam Medis</span></a>
                    <a href="{{ route('pasien.index') }}?mode=rekap_saya" class="menu-card menu-nurse"><i class="fa-solid fa-clipboard-list"></i> <span>Riwayat Inputan Saya</span></a>
                @endif
            </div>
        @else
            <div style="text-align:center; max-width: 600px; margin: 0 auto; padding: 40px; border: 1px dashed #ccc; border-radius: 20px; background: #f9f9f9;">
                <i class="fa-solid fa-lock" style="font-size: 40px; color: #ccc; margin-bottom: 20px;"></i>
                <h3 style="color:#555;">Menu Terkunci</h3>
                <p style="color:#777; margin-bottom: 20px;">Silakan login untuk mengakses menu.</p>
                <a href="{{ route('login') }}" style="background:#1565c0; color:white; padding:12px 30px; border-radius:30px; text-decoration:none; font-weight:bold;">Login Staff</a>
            </div>
        @endauth
    </div>

</body>
</html>