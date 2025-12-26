<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 Kolom */
            gap: 30px;
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
        }
        .menu-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            text-decoration: none;
            color: #333;
            font-size: 20px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 150px;
        }
        .menu-card:hover {
            background: #e3f2fd;
            transform: translateY(-5px);
            color: #1565c0;
        }
        .menu-card i { font-size: 40px; margin-bottom: 15px; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div id="bg-hospital" style="z-index:-1;">
        {{-- Konten Grid Menu --}}
        <div class="menu-grid">
            
            {{-- Tombol 1: Data Dokter --}}
            <a href="{{ route('dokter.index') }}" class="menu-card">
                <i class="fa-solid fa-user-doctor"></i>
                Kelola Data Dokter
            </a>

            {{-- Tombol 2: Data Pasien --}}
            <a href="{{ route('pasien.index') }}" class="menu-card">
                <i class="fa-solid fa-hospital-user"></i>
                Kelola Data Pasien
            </a>

            {{-- Tombol 3: Data Jadwal --}}
            <a href="{{ route('jadwal.index') }}" class="menu-card">
                <i class="fa-solid fa-calendar-days"></i>
                Kelola Jadwal Praktik
            </a>

            {{-- Tombol 4: Data Poliklinik (Contoh belum ada linknya) --}}
            <a href="#" class="menu-card">
                <i class="fa-solid fa-house-medical"></i>
                Kelola Poliklinik
            </a>

        </div>
    </div>

</body>
</html>