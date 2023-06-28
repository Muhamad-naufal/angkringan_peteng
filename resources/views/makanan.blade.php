@extends('layouts.tamu', ['title' => 'Makanan'])

@section('content')
    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <form id="order-form" action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="table_number">Nomor Meja</label>
                    <input type="text" class="form-control" id="table_number" name="table_number" required>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Makanan</th>
                            <th>Harga Makanan</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp
                        @foreach ($data as $row)
                            @if ($count < 10)
                                <tr>
                                    <td>{{ ucwords($row->nama_makanan) }}</td>
                                    <td>Rp. {{ number_format($row->harga_makanan, 2, ',', '.') }}</td>
                                    <td>
                                        <input type="number" class="form-control quantity-input" name="quantity[]"
                                            value="0" min="0" data-price="{{ $row->harga_makanan }}">
                                        <input type="hidden" name="food_id[]" value="{{ $row->id }}">
                                    </td>
                                    <td>
                                        Rp. <span class="subtotal">0.00</span>
                                    </td>
                                </tr>
                            @endif
                            @php $count++; @endphp
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary mt-3" style="margin-bottom: 80px">Lanjutkan Pemesanan</button>
            </form>
        </div>
    </div>

    <!-- Order Confirmation Modal -->
    <div class="modal fade" id="orderConfirmationModal" tabindex="-1" role="dialog"
        aria-labelledby="orderConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderConfirmationModalLabel">Konfirmasi Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Makanan</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody id="orderSummaryTableBody"></tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                <td id="orderTotalPrice">Rp. 0.00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmOrderButton">Konfirmasi Pesanan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Calculate and update subtotal for each row
            $('.quantity-input').on('input', function() {
                var quantity = parseInt($(this).val());
                var price = parseFloat($(this).data('price'));
                var subtotal = quantity * price;

                $(this).closest('tr').find('.subtotal').text(subtotal.toFixed(2));

                calculateTotalPrice();
            });

            // Calculate and update total price
            function calculateTotalPrice() {
                var totalPrice = 0;
                $('.quantity-input').each(function() {
                    var quantity = parseInt($(this).val());
                    var price = parseFloat($(this).data('price'));
                    var subtotal = quantity * price;
                    totalPrice += subtotal;
                });

                $('#orderTotalPrice').text('Rp. ' + totalPrice.toFixed(2));
            }

            // Show order confirmation modal
            $('#order-form').submit(function(event) {
                event.preventDefault();

                $('#orderSummaryTableBody').empty();

                $('.quantity-input').each(function() {
                    var quantity = parseInt($(this).val());
                    var price = parseFloat($(this).data('price'));
                    var subtotal = quantity * price;

                    if (quantity > 0) {
                        var foodName = $(this).closest('tr').find('td:first').text();

                        var row = '<tr>' +
                            '<td>' + foodName + '</td>' +
                            '<td>' + quantity + '</td>' +
                            '<td>Rp. ' + price.toFixed(2) + '</td>' +
                            '</tr>';

                        $('#orderSummaryTableBody').append(row);
                    }
                });

                calculateTotalPrice();

                $('#orderConfirmationModal').modal('show');
            });

            // Handle order confirmation
            $('#confirmOrderButton').click(function() {
                $('#orderConfirmationModal').modal('hide');
                $('#confirmOrderButton').click(function() {
                    $('#orderConfirmationModal').modal('hide');

                    // Submit the form
                    $('#order-form').off('submit').submit();
                });

                // Submit the form
                $('#order-form').off('submit').submit();
            });
        });
    </script>
@endsection
