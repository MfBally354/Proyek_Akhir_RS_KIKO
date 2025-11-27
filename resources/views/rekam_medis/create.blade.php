@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h4 class="mb-3">Tambah Rekam Medis untuk {{ $patient->name }}</h4>
    <form method="POST" action="{{ route('rekam.store', $patient->id) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Diagnosa</label>
            <input type="text" name="diagnosa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Resep</label>
            <input type="text" name="resep" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Tindakan</label>
            <input type="text" name="tindakan" class="form-control">
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

