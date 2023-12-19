<!-- resources/views/index.blade.php -->

@extends('layouts.master')

@section('title', 'List of Orders')

@section('content')
    <div class="container mt-4">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Menus</h5>
                        <p class="card-text">{{ $totalMenus }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('order') }}" class="btn btn-primary btn-block mb-3">Buat Order</a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('menus.index') }}" class="btn btn-info btn-block mb-3">Data Menu</a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-block mb-3">List Order</a>
            </div>
        </div>
    </div>
@endsection
