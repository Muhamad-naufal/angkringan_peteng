@extends('layouts.admin', ['title' => 'Edit Makanan'])

@section('content-header')
    <h1 class="m-0"><i class="fa-solid fa-plate-utensils"> Makanan</i></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <x-form-edit :action="route('makanan.update', ['makanan' => $row->id])" :upload="true">
                <x-input label="Nama Makanan" name="nama_makanan" :value="$row->nama_makanan" />
                @if ($row->foto_makanan)
                    <div class="form-group">
                        <img src="{{ url('images/makanan/' . $row->foto_makanan) }}" class="img-fluid">
                    </div>
                @endif
                <x-input label="Foto" name="foto_makanan" type="file"
                    keterangan="Foto bertipe : jpg, png, jpeg. Dimensi : min width 100, min hight 500px. Ukuran : min 50kb, max 1000kb." />
                <x-input label="Jumlah" name="jum_makanan" type="number" :value="$row->jum_makanan" />
                <x-input label="Harga" name="harga_makanan" type="number" :value="$row->harga_makanan" />
            </x-form-edit>
        </div>
    </div>
@endsection
