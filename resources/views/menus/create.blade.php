@extends('layouts.master')

@section('title', 'Create Menu')

@section('content')
    <h1>Create Menu</h1>

    <!-- Form untuk menambahkan menu baru -->

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf

        <label for="id">ID:</label>
        <input type="text" name="id" value="{{ old('id') }}" required>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ old('nama') }}" required>

        <label for="rekomendasi">Rekomendasi:</label>
        <input type="hidden" name="rekomendasi" value="0">
        <input type="checkbox" name="rekomendasi" value="1" {{ old('rekomendasi') ? 'checked' : '' }}>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" value="{{ old('harga') }}" required min="0">

        <label for="kategori">Kategori:</label>
        <input type="text" name="kategori" value="{{ old('kategori') }}" required>

        <button type="submit">Tambah</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('menus.index') }}">Kembali</a>
@endsection
