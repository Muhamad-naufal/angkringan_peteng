@extends('layouts.admin', ['title' => 'Orderan'])

@section('content')
    <div class="container">
        <h1>Order Management</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Nama Makanan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>No Meja</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    @if ($order->status !== 'Selesai')
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->food_name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>Rp. {{ number_format($order->price, 2, ',', '.') }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <form action="{{ route('order.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Selesai</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
