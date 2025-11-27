<h2>Data Dokter</h2>
<a href="{{ route('dokter.create') }}">Tambah Dokter</a>

<table>
    <tr>
        <th>Nama</th>
        <th>Spesialis</th>
        <th>Aksi</th>
    </tr>

    @foreach($dokters as $d)
    <tr>
        <td>{{ $d->nama }}</td>
        <td>{{ $d->spesialis }}</td>
        <td>
            <a href="{{ route('dokter.edit', $d->id) }}">Edit</a>
            <form action="{{ route('dokter.destroy', $d->id) }}" method="POST">
                @csrf @method('DELETE')
                <button>Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
