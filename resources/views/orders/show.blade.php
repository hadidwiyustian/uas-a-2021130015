<!-- resources/views/order/show.blade.php -->

@extends('layouts.master')

@section('title', 'Order Details')

@section('content')
    <div class="container mt-4">
        <h1>Order Details</h1>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $order->status }}</td>
            </tr>
            <!-- Add other details as needed -->

            <!-- Example: Show order items with prices, discounts, and total price -->
            <tr>
                <th>Order Items</th>
                <td>
                    @if($order->orderItems->isEmpty())
                        <p>No items in this order.</p>
                    @else
                        <ul>
                            @php
                                $totalPrice = 0;
                            @endphp

                            @foreach($order->orderItems as $item)
                                @php
                                    $menu = $item->menu;
                                    $quantity = $item->quantity;
                                    $price = $menu->harga;
                                    $isRecommended = $menu->rekomendasi;
                                    $discount = $isRecommended ? 0.10 : 0.0;
                                    $discountedPrice = $price - ($price * $discount);
                                    $subtotal = $quantity * $discountedPrice;
                                    $totalPrice += $subtotal;
                                @endphp

                                <li>
                                    <strong>Menu:</strong> {{ $menu->nama }},
                                    <strong>Quantity:</strong> {{ $quantity }},
                                    <strong>Price:</strong> {{ $price }},
                                    <strong>Discounted Price:</strong> {{ $discountedPrice }},
                                    <strong>Subtotal:</strong> {{ $subtotal }}
                                </li>
                            @endforeach

                            <li>
                                <strong>Total Price:</strong> {{ $totalPrice }}
                                <br>
                                <strong>PPN (11%):</strong> {{ $totalPrice * 0.11 }}
                                <br>
                                <strong>Grand Total:</strong> {{ $totalPrice * 1.11 }}
                            </li>
                        </ul>
                    @endif
                </td>
            </tr>
        </table>

        <a href="{{ route('order') }}" class="btn btn-secondary mt-3">Back to Order List</a>
    </div>
@endsection
