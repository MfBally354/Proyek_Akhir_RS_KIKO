<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Data Pasien</title>
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
        
        .badge { padding: 5px 10px; border-radius: 15px; font-size: 12px; font-weight: bold; }
        .badge-lk { background: #e3f2fd; color: #1565c0; }
        .badge-pr { background: #fce4ec; color: #c2185b; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="container">
        
        <div class="page-header">
            <h2 style="color:#333;">Kelola Data Pasien</h2>
            <a href="{{ route('pasien.create') }}" class="btn-add">
                <i class="fa-solid fa-plus"></i> Tambah Pasien Baru
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
                    <th>No. RM</th>
                    <th>Nama Pasien</th>
                    <th>L/P</th>
                    <th>Usia</th>
                    <th>Gol. Darah</th>
                    <th>Riwayat Penyakit</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pasien as $p)
                <tr>
                    <td><b>{{ $p->nomor_rm }}</b></td>
                    <td>
                        {{ $p->nama_pasien }} <br>
                        <small style="color:gray;">NIK: {{ $p->nik ?? '-' }}</small>
                    </td>
                    <td>
                        <span class="badge {{ $p->jenis_kelamin == 'Laki-laki' ? 'badge-lk' : 'badge-pr' }}">
                            {{ $p->jenis_kelamin }}
                        </span>
                    </td>
                    {{-- Usia dihitung otomatis dari Model --}}
                    <td>{{ $p->usia }}</td>
                    <td>{{ $p->golongan_darah ?? '-' }}</td>
                    <td>
                        @if($p->riwayat_penyakit)
                            <span style="color:#d32f2f; font-size:13px;">{{ Str::limit($p->riwayat_penyakit, 30) }}</span>
                        @else
                            <span style="color:green; font-size:13px;">Sehat</span>
                        @endif
                    </td>
                    <td style="text-align:center;">
                        {{-- Semua bisa lihat detail --}}
                        <a href="{{ route('pasien.show', $p->id_pasien) }}" style="color:#1565c0; margin-right:10px;" title="Lihat Detail">
                            <i class="fa-solid fa-eye fa-lg"></i>
                        </a>

                        {{-- Semua bisa edit (sesuai studi kasus: perawat mengubah data pasien) --}}
                        <a href="{{ route('pasien.edit', $p->id_pasien) }}" style="color:#ffa000; margin-right:10px;" title="Edit">
                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                        </a>

                        {{-- HANYA ADMIN (ROLE 1) YANG BISA HAPUS --}}
                        @if(Auth::user()->id_role == 1)
                            <form action="{{ route('pasien.destroy', $p->id_pasien) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus data pasien ini?');">
                                @csrf @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:#d32f2f; cursor:pointer;" title="Hapus">
                                    <i class="fa-solid fa-trash-can fa-lg"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center; padding: 30px; color: gray;">
                        Belum ada data pasien.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div style="margin-top: 20px;">
            {{ $pasien->links() }}
        </div>

    </div>

</body>
</html>