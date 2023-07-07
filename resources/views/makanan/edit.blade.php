@extends('layouts.admin', ['title' => 'Edit Makanan'])

@section('content-header')
    <h1 class="m-0"><i class="fa-solid fa-plate-utensils"> Edit Makanan</i></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('makanan.update', ['makanan' => $makanan->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_makanan">Nama Makanan</label>
                    <input type="text" class="form-control" id="nama_makanan" name="nama_makanan"
                        value="{{ $makanan->nama_makanan }}" required>
                </div>

                <div class="form-group">
                    <label for="foto_makanan">Foto Makanan</label>
                    @if ($makanan->foto_makanan)
                        <div class="mb-2">
                            <img src="{{ asset('images/makanan/' . $makanan->foto_makanan) }}" alt="Foto Makanan"
                                style="max-width: 200px">
                        </div>
                    @endif
                    <input type="file" class="form-control" id="foto_makanan" name="foto_makanan">
                </div>

                <div class="form-group">
                    <label for="jum_makanan">Jumlah</label>
                    <input type="number" class="form-control" id="jum_makanan" name="jum_makanan"
                        value="{{ $makanan->jum_makanan }}" required>
                </div>

                <div class="form-group">
                    <label for="harga_makanan">Harga</label>
                    <input type="number" class="form-control" id="harga_makanan" name="harga_makanan"
                        value="{{ $makanan->harga_makanan }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
