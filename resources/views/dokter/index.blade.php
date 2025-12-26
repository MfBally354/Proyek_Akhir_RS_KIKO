<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Data Dokter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .container { max-width: 1200px; margin: 40px auto; padding: 20px; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .btn-add { background: #1565c0; color: white; padding: 12px 25px; border-radius: 30px; text-decoration: none; font-weight: bold; }
        
        .table-custom { width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .table-custom th { background: #e3f2fd; padding: 15px; text-align: left; color: #1565c0; font-weight: 800; }
        .table-custom td { padding: 15px; border-bottom: 1px solid #eee; color: #333; }
        .table-custom tr:last-child td { border-bottom: none; }
        
        .badge { padding: 5px 10px; border-radius: 15px; font-size: 12px; font-weight: bold; background: #e8f5e9; color: #2e7d32; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="container">
        
        <div class="page-header">
            <h2 style="color:#333;">Kelola Data Dokter</h2>
            <a href="{{ route('dokter.create') }}" class="btn-add">
                <i class="fa-solid fa-user-plus"></i> Tambah Dokter
            </a>
        </div>

        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-custom">
            <thead>
                <tr>
                    <th>Nama Dokter</th>
                    <th>Spesialisasi</th>
                    <th>Poliklinik</th>
                    <th>Kontak</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dokters as $d)
                <tr>
                    <td><b>{{ $d->nama_dokter }}</b></td>
                    <td>{{ $d->spesialisasi }}</td>
                    <td><span class="badge">{{ $d->poli->nama_poli ?? '-' }}</span></td>
                    <td>{{ $d->kontak }}</td>
                    <td style="text-align:center;">
                        <a href="{{ route('dokter.show', $d->id_dokter) }}" style="color:#1565c0; margin-right:10px;" title="Lihat Detail">
                            <i class="fa-solid fa-eye fa-lg"></i>
                        </a>
                        <a href="{{ route('dokter.edit', $d->id_dokter) }}" style="color:#ffa000; margin-right:10px;" title="Edit">
                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                        </a>
                        <form action="{{ route('dokter.destroy', $d->id_dokter) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus data dokter ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:#d32f2f; cursor:pointer;" title="Hapus">
                                <i class="fa-solid fa-trash-can fa-lg"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding: 30px; color: gray;">
                        Belum ada data dokter.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div style="margin-top: 20px;">
            {{ $dokters->links() }}
        </div>

    </div>

</body>
</html>