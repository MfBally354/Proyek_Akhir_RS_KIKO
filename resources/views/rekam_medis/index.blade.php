@extends('layouts.app')

@section('content')
<h4 class="mb-3">Riwayat Rekam Medis: {{ $patient->name }}</h4>
<a href="{{ route('rekam.create', $patient->id) }}" class="btn btn-primary mb-3">Tambah Rekam Medis</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Diagnosa</th>
            <th>Resep</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->created_at->format('d M Y') }}</td>
            <td>{{ $record->diagnosa }}</td>
            <td>{{ $record->resep }}</td>
            <td>{{ $record->tindakan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
