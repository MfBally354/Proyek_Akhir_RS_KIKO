<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - RS KIKO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div id="bg-hospital"></div>

    <div class="auth-wrapper">
        <div class="auth-box" style="max-width: 450px;"> {{-- Sedikit lebih lebar --}}
            
            <h2 style="color:#1565c0; font-weight:900; margin-bottom:10px;">MYMEDICAL</h2>
            <h4 class="auth-title">Pendaftaran Pegawai</h4>

            @if ($errors->any())
                <div style="background: #ffebee; color: #c62828; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 13px; text-align:left;">
                    <ul style="margin-left: 20px; margin-top:0; margin-bottom:0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-input" placeholder="Nama Lengkap" required value="{{ old('nama_lengkap') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Email Perusahaan</label>
                    <input type="email" name="email" class="form-input" placeholder="akhiran @admin atau @user" required value="{{ old('email') }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="Minimal 6 karakter" required>
                </div>

                <button type="submit" class="btn-primary">
                    Daftar Sekarang
                </button>

                <div class="auth-footer">
                    <span>Sudah punya akun?</span>
                    <a href="{{ route('login') }}" class="link-blue">
                        Login di sini
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>