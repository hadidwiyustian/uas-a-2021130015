<!-- resources/views/index.blade.php -->

@extends('layouts.master')

@section('title', 'List of Orders')

@section('content')
    <div class="container mt-4">
        <h1>List of Orders</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($orders->isEmpty())
            <p>No orders available.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Actions</th> <!-- New column for actions -->
                        <!-- Add other columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('orders.show', ['id' => $order->id]) }}" class="btn btn-primary">View Details</a>
                            </td>
                            <!-- Add other columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('order') }}" class="btn btn-secondary mt-3">Back to Menus</a>
    </div>
@endsection
