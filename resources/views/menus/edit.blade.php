@extends('layouts.master')

@section('title', 'Edit Menu')

@section('content')
    <h1>Edit Menu</h1>

    <!-- Form untuk mengedit menu -->

    <form action="{{ route('menus.update', ['menu' => $menu->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ $menu->nama }}" required>

        <label for="rekomendasi">Rekomendasi:</label>
        <input type="hidden" name="rekomendasi" value="0">
        <input type="checkbox" name="rekomendasi" value="1" {{ $menu->rekomendasi ? 'checked' : '' }}>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" value="{{ $menu->harga }}" required min="0">

        <label for="kategori">Kategori:</label>
        <input type="text" name="kategori" value="{{ $menu->kategori }}" required>

        <button type="submit">Update</button>
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
