<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Data Perawat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .container { max-width: 1200px; margin: 40px auto; padding: 20px; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .btn-add { background: #1565c0; color: white; padding: 12px 25px; border-radius: 30px; text-decoration: none; font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .btn-add:hover { background: #0d47a1; }
        
        .table-custom { width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .table-custom th { background: #e3f2fd; padding: 15px; text-align: left; color: #1565c0; font-weight: 800; text-transform: uppercase; font-size: 14px; }
        .table-custom td { padding: 15px; border-bottom: 1px solid #eee; color: #333; }
        .table-custom tr:last-child td { border-bottom: none; }
        .table-custom tr:hover { background-color: #fcfcfc; }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="container">
        
        <div class="page-header">
            <h2 style="color:#333; font-weight: 800; border-left: 5px solid #1565c0; padding-left: 15px;">
                KELOLA DATA PERAWAT (KARYAWAN)
            </h2>
            <a href="{{ route('perawat.create') }}" class="btn-add">
                <i class="fa-solid fa-user-plus"></i> Tambah Perawat
            </a>
        </div>

        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 10px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                <i class="fa-solid fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 10px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}
            </div>
        @endif

        <table class="table-custom">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email (Login)</th>
                    <th>Hak Akses</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($perawats as $p)
                <tr>
                    <td><b>{{ $p->nama_lengkap }}</b></td>
                    <td>{{ $p->username }}</td>
                    <td>{{ $p->email }}</td>
                    <td>
                        <span style="background: #e8f5e9; color: #2e7d32; padding: 5px 10px; border-radius: 15px; font-size: 12px; font-weight: bold;">
                            Perawat
                        </span>
                    </td>
                    <td style="text-align:center;">
                        <a href="{{ route('perawat.edit', $p->id_user) }}" style="color:#ffa000; margin-right:10px;" title="Edit Data & Password">
                            <i class="fa-solid fa-user-pen fa-lg"></i>
                        </a>
                        <form action="{{ route('perawat.destroy', $p->id_user) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus akun perawat ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:#d32f2f; cursor:pointer;" title="Hapus Akun">
                                <i class="fa-solid fa-trash-can fa-lg"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding: 40px; color: gray;">
                        <i class="fa-solid fa-users-slash" style="font-size: 40px; margin-bottom: 10px;"></i><br>
                        Belum ada data perawat.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div style="margin-top: 20px;">
            {{ $perawats->links() }}
        </div>

    </div>

</body>
</html>