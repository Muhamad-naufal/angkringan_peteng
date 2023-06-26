@extends('layouts.admin', ['title' => 'Makanan'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-plate-utensils"> Makanan</i></h1>
@endsection

@section('content')
    <x-status />

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <x-btn-create :link="route('makanan.create')" />
                </div>
                <div class="col">
                    <x-search />
                </div>
            </div>
        </div>
        <x-card-table />
        <div class="card-body p-0">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Makanan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ ucwords($row->nama_makanan) }}</td>
                            <td>Rp. {{ number_format($row->harga_makanan, 2, ',', '.') }}</td>
                            <td>{{ $row->jum_makanan }}</td>
                            <td>
                                <x-btn-edit :link="route('makanan.edit', ['makanan' => $row->id])" />
                                <form onsubmit="return confirm('Anda memilih menghapus data, apakah yakin ?')" method="POST"
                                    action="{{ route('makanan.destroy', $row->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm" type="submit" name="submit"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
