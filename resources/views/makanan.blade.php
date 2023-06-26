@extends('layouts.tamu', ['title' => 'Makanan'])

@section('content')
    <div class="container cont mx-auto" style="margin-top: 80px;">
        <div class="row">
            @php $count = 0; @endphp
            @foreach ($data as $row)
                @if ($count < 10)
                    <div class="col-4 mx-auto">
                        <div class="card">
                            @if ($row->foto_makanan)
                                <div class="form-group">
                                    <img src="{{ url('images/makanan/' . $row->foto_makanan) }}" class="img-fluid"
                                        style="width: 400px; height: 200px;">
                                </div>
                            @endif
                            <div class="card-body card-content">
                                <h5 class="card-title custom-titlekamar">{{ ucwords($row->nama_makanan) }}</h5>
                                <p class="card-text">Rp. {{ number_format($row->harga_makanan, 2, ',', '.') }} </p>
                                <a href="#" class="btn btn-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                @endif
                @php $count++; @endphp
            @endforeach
        </div>
    </div>
@endsection
