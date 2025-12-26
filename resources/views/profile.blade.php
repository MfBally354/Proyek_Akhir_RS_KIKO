<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- Panggil CSS Global --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* CSS Khusus Halaman Profil */
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.95); /* Putih agak transparan */
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            position: relative; /* Penting agar muncul di atas background */
            z-index: 10;        /* Pastikan di atas background */
        }
        .profile-header {
            background: #1565c0; /* Biru */
            color: white;
            padding: 30px;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .profile-body {
            padding: 30px;
        }
        .profile-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .profile-label { font-weight: bold; color: #666; display: block; margin-bottom: 5px; font-size: 14px; text-transform: uppercase; }
        .profile-value { font-size: 18px; color: #333; font-weight: 500; }
        
        .btn-logout {
            background: #d32f2f;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .btn-logout:hover { background: #b71c1c; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(211, 47, 47, 0.3); }
    </style>
</head>
<body>

    @include('components.navbar')

    {{-- 1. BACKGROUND DIPISAH (Agar tidak menutupi tombol) --}}
    <div id="bg-hospital"></div>

    {{-- 2. KONTEN UTAMA --}}
    <div class="profile-container">
        <div class="profile-header">
            <i class="fa-solid fa-id-card-clip"></i>
            PROFIL SAYA
        </div>

        <div class="profile-body">
            
            <div class="profile-item">
                <span class="profile-label">Nama Lengkap</span>
                <span class="profile-value">{{ $user->nama_lengkap }}</span>
            </div>

            <div class="profile-item">
                <span class="profile-label">Username</span>
                <span class="profile-value">{{ $user->username }}</span>
            </div>

            <div class="profile-item">
                <span class="profile-label">Email</span>
                <span class="profile-value">{{ $user->email }}</span>
            </div>

            <div class="profile-item">
                <span class="profile-label">Jabatan</span>
                <span class="profile-value">
                    <span style="background: {{ $user->id_role == 1 ? '#ef5350' : '#ffa726' }}; color: white; padding: 2px 10px; border-radius: 5px; font-size: 14px;">
                        {{ $user->id_role == 1 ? 'ADMINISTRATOR' : 'PERAWAT' }}
                    </span>
                </span>
            </div>

            {{-- TOMBOL LOGOUT --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fa-solid fa-right-from-bracket"></i> KELUAR / LOGOUT
                </button>
            </form>

        </div>
    </div>

</body>
</html>