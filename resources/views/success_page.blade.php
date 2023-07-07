@extends('layouts.tamu', ['title' => 'Success'])

@section('content')
    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Resi Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Makanan</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($orderDetails as $order)
                                        <tr>
                                            <td>{{ $order['foodName'] }}</td>
                                            <td>{{ $order['quantity'] }}</td>
                                            <td>Rp. {{ number_format($order['price'], 2, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($order['subtotal'], 2, ',', '.') }}</td>
                                        </tr>
                                        @php
                                            $totalPrice += $order['subtotal'];
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <td>Rp. {{ number_format($totalPrice, 2, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <a href="{{ route('makanan') }}" class="btn btn-secondary">Kembali</a>
                <button type="button" class="btn btn-primary" onclick="printReceipt()">Print</button>
            </div>
        </div>
    </div>

    <script>
        function printReceipt() {
            window.print();
        }
    </script>
@endsection
