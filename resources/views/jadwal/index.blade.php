<h2>Jadwal Dokter</h2>
<a href="{{ route('jadwal.create') }}">Tambah Jadwal</a>

<table>
    <tr>
        <th>Dokter</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Aksi</th>
    </tr>

    @foreach($jadwals as $j)
    <tr>
        <td>{{ $j->dokter->nama }}</td>
        <td>{{ $j->hari }}</td>
        <td>{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
        <td>
            <a href="{{ route('jadwal.edit', $j->id) }}">Edit</a>
            <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST">
                @csrf @method('DELETE')
                <button>Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
