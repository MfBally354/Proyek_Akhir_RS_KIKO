<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Perawat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .form-container { max-width: 600px; margin: 40px auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        .form-label { font-weight: bold; color: #555; display: block; margin-bottom: 8px; }
        .form-input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; }
        .btn-submit { background: #ffa000; color: white; padding: 15px; width: 100%; border: none; border-radius: 10px; font-weight: bold; font-size: 16px; cursor: pointer; margin-top: 20px; }
        .btn-submit:hover { background: #ff8f00; }
        .alert-info { background: #e3f2fd; color: #0d47a1; padding: 10px; border-radius: 8px; font-size: 13px; margin-bottom: 15px; border: 1px solid #bbdefb; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="form-container">
        <h2 style="text-align:center; color:#333; margin-bottom:30px; border-bottom: 2px solid #eee; padding-bottom: 15px;">
            Edit Data Perawat
        </h2>

        <form action="{{ route('perawat.update', $perawat->id_user) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-input" value="{{ $perawat->nama_lengkap }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-input" value="{{ $perawat->username }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" value="{{ $perawat->email }}" required>
            </div>

            {{-- Kolom Reset Password --}}
            <div class="alert-info">
                <i class="fa-solid fa-circle-info"></i> 
                Kosongkan kolom password jika tidak ingin mengubah password akun ini.
            </div>

            <div class="form-group">
                <label class="form-label">Password Baru (Opsional)</label>
                <input type="password" name="password" class="form-input" placeholder="Masukkan password baru...">
            </div>

            <button type="submit" class="btn-submit">
                <i class="fa-solid fa-pen-to-square"></i> UPDATE DATA
            </button>
            
            <a href="{{ route('perawat.index') }}" style="display:block; text-align:center; margin-top:15px; color:#666; text-decoration:none;">Batal</a>

        </form>
    </div>

</body>
</html>