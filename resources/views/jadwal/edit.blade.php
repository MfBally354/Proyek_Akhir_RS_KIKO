<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal</title>
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
        <h2 style="text-align:center; color:#333; margin-bottom:30px;">Edit Jadwal Praktik</h2>

        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="form-label">Pilih Dokter</label>
                <select name="dokter_id" class="form-select" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($dokters as $d)
                        <option value="{{ $d->id_dokter }}" {{ $jadwal->dokter_id == $d->id_dokter ? 'selected' : '' }}>
                            {{ $d->nama_dokter }} ({{ $d->spesialisasi }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Hari Praktik</label>
                <select name="hari" class="form-select" required>
                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $h)
                        <option value="{{ $h }}" {{ $jadwal->hari == $h ? 'selected' : '' }}>{{ $h }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" style="display:flex; gap:10px;">
                <div style="flex:1;">
                    <label class="form-label">Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="form-input" value="{{ $jadwal->jam_mulai }}" required>
                </div>
                <div style="flex:1;">
                    <label class="form-label">Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="form-input" value="{{ $jadwal->jam_selesai }}" required>
                </div>
            </div>

            <button type="submit" class="btn-submit">UPDATE JADWAL</button>
            <a href="{{ route('jadwal.index') }}" style="display:block; text-align:center; margin-top:15px; color:#666; text-decoration:none;">Batal</a>

        </form>
    </div>

</body>
</html>