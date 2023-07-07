@extends('layouts.admin', ['title' => 'Laporan'])

@section('content-header')
    <h1 class="m-0">Laporan Pemasukan Dan Pengeluaran</h1>
    <div class="btn-group" role="group" aria-label="Basic example">
        <form action="{{ route('orders.reset') }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success reset-button">Reset</button>
        </form>
        <button class="print-button btn btn-success" onclick="window.print()">Print Laporan</button>
    </div>
@endsection

@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Laporan Pemesanan</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            h1 {
                text-align: center;
                margin-top: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 30px;
            }

            table th,
            table td {
                border: 1px solid #000;
                padding: 8px;
                text-align: center;
            }

            table th {
                background-color: #f2f2f2;
            }

            p {
                margin-top: 10px;
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body>
        <h1>Laporan Pemesanan</h1>
        <table>
            <thead>
                <tr>
                    <th colspan="2">Pengeluaran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total pengeluaran</td>
                    <td>Rp. {{ number_format($totalExpenses, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th colspan="2">Pemasukan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total pemasukan</td>
                    <td>Rp. {{ number_format($totalRevenue, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <h2>Daftar Pemesanan</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Makanan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->food_name }}</td>
                        <td>Rp. {{ number_format($order->price, 2, ',', '.') }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>Rp. {{ number_format($order->price * $order->quantity, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
@endsection
