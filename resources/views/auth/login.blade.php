<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RS KIKO</title>
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- PANGGIL CSS EKSTERNAL --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <style>
    #bg-hospital {
    background-color: red; /* Untuk debug */
    background-image: url('../img/hospital-bg.jpeg'); /* Tetap simpan */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100vh;
    z-index: -1;
    }
    </style>

    {{-- Background Gambar --}}
    <div id="bg-hospital"></div>

    {{-- Kontainer Utama --}}
    <div class="auth-wrapper">
        
        <div class="auth-box">
            {{-- Judul --}}
            <h2 style="color:#1565c0; font-weight:900; margin-bottom:10px;">MYMEDICAL</h2>
            <h4 class="auth-title">Login Sistem RS</h4>

            {{-- Pesan Error --}}
            @if ($errors->any())
                <div style="background: #ffebee; color: #c62828; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; border: 1px solid #ef9a9a;">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" placeholder="Contoh: admin@admin" required autofocus>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="Masukkan Password" required>
                </div>

                <button type="submit" class="btn-primary">
                    Masuk
                </button>

                <div class="auth-footer">
                    <span>Pegawai Baru?</span>
                    <a href="{{ route('register') }}" class="link-blue">
                        Daftar Akun
                    </a>
                </div>
            </form>
        </div>

    </div>

</body>
</html>