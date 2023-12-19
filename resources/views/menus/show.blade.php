@extends('layouts.master')

@section('title', 'Menu Detail')

@section('content')
    <h1>Menu Detail</h1>

   <!-- Tampilan detail menu -->

<h1>Detail Menu</h1>

<p>ID: {{ $menu->id }}</p>

<p>Nama: {{ $menu->nama }}</p>

<p>Rekomendasi: {{ $menu->rekomendasi ? 'Ya' : 'Tidak' }}</p>

<p>Harga: {{ $menu->harga }}</p>

<p>Kategori: {{ $menu->kategori }}</p>

<a href="{{ route('menus.index') }}">Kembali</a>

@endsection
