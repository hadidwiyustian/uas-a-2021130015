@extends('layouts.master')

@section('title', 'Menu List')

@section('content')
    <div class="container mt-4">
        <h1>Menu List</h1>

        <!-- Tabel untuk menampilkan daftar menu -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Rekomendasi</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->nama }}</td>
                        <td>{{ $menu->rekomendasi ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $menu->harga }}</td>
                        <td>{{ $menu->kategori }}</td>
                        <td>
                            <a href="{{ route('menus.show', ['menu' => $menu->id]) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('menus.edit', ['menu' => $menu->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('menus.create') }}" class="btn btn-success">Tambah Menu</a>
    </div>
@endsection
