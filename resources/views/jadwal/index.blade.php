<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Jadwal Praktik</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .container { max-width: 1000px; margin: 40px auto; padding: 20px; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .btn-add { background: #1565c0; color: white; padding: 12px 25px; border-radius: 30px; text-decoration: none; font-weight: bold; }
        
        .table-custom { width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .table-custom th { background: #e3f2fd; padding: 15px; text-align: left; color: #1565c0; font-weight: 800; }
        .table-custom td { padding: 15px; border-bottom: 1px solid #eee; color: #333; }
        .table-custom tr:last-child td { border-bottom: none; }
        
        .badge { padding: 5px 10px; border-radius: 5px; font-size: 12px; font-weight: bold; background: #e3f2fd; color: #1565c0; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="container">
        
        <div class="page-header">
            <h2 style="color:#333;">Kelola Jadwal Praktik</h2>
            <a href="{{ route('jadwal.create') }}" class="btn-add">
                <i class="fa-solid fa-plus"></i> Tambah Jadwal
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
                    <th>Hari Praktik</th>
                    <th>Jam Praktik</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwals as $j)
                <tr>
                    <td>
                        <b>{{ $j->dokter->nama_dokter ?? 'Dokter Terhapus' }}</b> <br>
                        <small style="color:gray;">{{ $j->dokter->spesialisasi ?? '-' }}</small>
                    </td>
                    <td>
                        <span class="badge">{{ $j->hari }}</span>
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} - 
                        {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }} WIB
                    </td>
                    <td style="text-align:center;">
                        <a href="{{ route('jadwal.edit', $j->id) }}" style="color:#ffa000; margin-right:10px;" title="Edit">
                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                        </a>
                        <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus jadwal ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:#d32f2f; cursor:pointer;" title="Hapus">
                                <i class="fa-solid fa-trash-can fa-lg"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center; padding: 30px; color: gray;">
                        Belum ada jadwal dokter.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div style="margin-top: 20px;">
            {{ $jadwals->links() }}
        </div>

    </div>

</body>
</html>