<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Perawat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .form-container { max-width: 600px; margin: 40px auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        .form-label { font-weight: bold; color: #555; display: block; margin-bottom: 8px; }
        .form-input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; }
        .btn-submit { background: #1565c0; color: white; padding: 15px; width: 100%; border: none; border-radius: 10px; font-weight: bold; font-size: 16px; cursor: pointer; margin-top: 20px; }
        .btn-submit:hover { background: #0d47a1; }
        .note { font-size: 12px; color: #777; margin-top: 5px; display: block; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="form-container">
        <h2 style="text-align:center; color:#333; margin-bottom:30px; border-bottom: 2px solid #eee; padding-bottom: 15px;">
            Registrasi Perawat Baru
        </h2>

        <form action="{{ route('perawat.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-input" required placeholder="Contoh: Suster Siti Aminah">
            </div>

            <div class="form-group">
                <label class="form-label">Username (Untuk Login)</label>
                <input type="text" name="username" class="form-input" required placeholder="Contoh: siti">
            </div>

            <div class="form-group">
                <label class="form-label">Email (Wajib akhiran @user)</label>
                <input type="email" name="email" class="form-input" required placeholder="Contoh: siti@user">
                <span class="note">*Email digunakan sebagai identifikasi sistem login.</span>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" required placeholder="Minimal 6 karakter">
            </div>

            <button type="submit" class="btn-submit">
                <i class="fa-solid fa-save"></i> SIMPAN DATA PERAWAT
            </button>
            
            <a href="{{ route('perawat.index') }}" style="display:block; text-align:center; margin-top:15px; color:#666; text-decoration:none;">Batal</a>

        </form>
    </div>

</body>
</html>