@extends('layouts.admin', ['title' => 'User Admin'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-users"> User Admin</i></h1>
@endsection

@section('content')
    <x-status />

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <x-btn-create :link="route('admin.create')" />
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
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->role }}</td>
                            <td>
                                <x-btn-edit :link="route('admin.edit', ['admin' => $row->id])" />
                                <form onsubmit="return confirm('Anda memilih menghapus data, apakah yakin ?')" method="POST"
                                    action="{{ route('admin.destroy', $row->id) }}" class="d-inline">
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

@section('modal')
    <x-modal-delete />
@endsection
