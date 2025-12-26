<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Dokter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .form-container { max-width: 600px; margin: 40px auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        .form-label { font-weight: bold; color: #555; display: block; margin-bottom: 8px; }
        .form-input, .form-select { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; }
        .btn-submit { background: #ffa000; color: white; padding: 15px; width: 100%; border: none; border-radius: 10px; font-weight: bold; font-size: 16px; cursor: pointer; margin-top: 10px; }
        .btn-submit:hover { background: #ff8f00; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="form-container">
        <h2 style="text-align:center; color:#333; margin-bottom:30px;">Edit Data Dokter</h2>

        <form action="{{ route('dokter.update', $dokter->id_dokter) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="form-label">Nama Dokter</label>
                <input type="text" name="nama_dokter" class="form-input" value="{{ $dokter->nama_dokter }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Spesialisasi</label>
                <input type="text" name="spesialisasi" class="form-input" value="{{ $dokter->spesialisasi }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Nomor Kontak</label>
                <input type="text" name="kontak" class="form-input" value="{{ $dokter->kontak }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Poliklinik</label>
                <select name="id_poli" class="form-select" required>
                    <option value="">-- Pilih Poli --</option>
                    @foreach($polis as $p)
                        <option value="{{ $p->id_poli }}" {{ $dokter->id_poli == $p->id_poli ? 'selected' : '' }}>
                            {{ $p->nama_poli }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-submit">UPDATE DATA</button>
            <a href="{{ route('dokter.index') }}" style="display:block; text-align:center; margin-top:15px; color:#666; text-decoration:none;">Batal</a>

        </form>
    </div>

</body>
</html>