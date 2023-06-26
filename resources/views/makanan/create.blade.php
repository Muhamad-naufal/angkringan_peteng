@extends('layouts.admin', ['title' => 'Tambah Makanan'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-plate-utensils"> Makanan</i></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <x-form-create :action="route('makanan.store')" :upload="true">
                <x-input label="Nama Makanan" name="nama_makanan" />
                <x-input label="Foto" name="foto" type="file"
                    keterangan="Foto bertipe : jpg, png, jpeg. Dimensi : min width 100, min hight 500px. Ukuran : min 50kb, max 1000kb." />
                <x-input label="Jumlah" name="jumlah" type="number" />
                <x-input label="Harga" name="harga" type="number" />
            </x-form-create>
        </div>
    </div>
@endsection
