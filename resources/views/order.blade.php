@extends('layouts.master')

@section('title', 'Input Order')

@section('content')
    <div class="container mt-4">

        <form action="{{ route('order.createOrder') }}" method="POST">
            @csrf

            <hr>
            <h1>Order Items</h1>

            <div class="form-group">
                <label for="status">Status Pembayaran:</label>
                <select class="form-control" name="status" id="status">
                    <option value="menunggu_pembayaran" {{ old('status') == 'menunggu_pembayaran' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                    <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div id="order-items-container">
                <!-- Table to display added items -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="order-items-table-body">
                        <!-- Table body will be dynamically populated with added items -->
                    </tbody>
                </table>



                <!-- Add item form -->
                <div class="order-item">
                    <div class="form-group">
                        <label for="menu_id">Menu:</label>
                        <select class="form-control" name="menu_ids[]" required>
                            <option value="" disabled selected>Select Menu</option>
                            <!-- Populate menu options dynamically from your database -->
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" name="quantities[]" value="{{ old('quantities.0', 1) }}" required min="1">
                        <!-- Use old('quantities.0', 1) to set a default value of 1 if not provided -->
                    </div>

                    <button type="button" class="btn btn-danger remove-item">Remove Item</button>
                </div>
            </div>

            <button type="button" class="btn btn-success" id="add-item">Add Item</button>

            <hr>

            <button type="submit" class="btn btn-primary">Submit Order</button>
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

        <a href="{{ route('menus.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
    </div>

    <script>
        // Script to dynamically add/remove order items and update the table
        document.addEventListener('DOMContentLoaded', function () {
            const addItemButton = document.getElementById('add-item');
            const orderItemsContainer = document.getElementById('order-items-container');
            const orderItemsTableBody = document.getElementById('order-items-table-body');

            addItemButton.addEventListener('click', function () {
                const newItem = orderItemsContainer.children[1].cloneNode(true);
                newItem.querySelector('.remove-item').addEventListener('click', function () {
                    newItem.remove();
                    updateTable();
                });

                orderItemsContainer.appendChild(newItem);
                updateTable();
            });

            function updateTable() {
                const items = orderItemsContainer.querySelectorAll('.order-item');
                orderItemsTableBody.innerHTML = '';

                items.forEach(function (item, index) {
                    const menuId = item.querySelector('[name="menu_ids[]"]').value;
                    const quantity = item.querySelector('[name="quantities[]"]').value;

                    // Find the menu name associated with the menuId
                    const menuName = Array.from(document.querySelector('[name="menu_ids[]"]').options)
                        .find(option => option.value === menuId).text;

                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${menuName}</td>
                        <td>${quantity}</td>
                        <td><button type="button" class="btn btn-danger remove-item" data-index="${index}">Remove Item</button></td>
                    `;

                    orderItemsTableBody.appendChild(row);
                });

                const removeButtons = document.querySelectorAll('.remove-item');
                removeButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        const index = this.getAttribute('data-index');
                        items[index].remove();
                        updateTable();
                    });
                });
            }
        });
    </script>
@endsection
