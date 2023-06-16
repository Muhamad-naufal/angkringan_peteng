@extends('layouts.admin', ['title' => 'User Admin'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-users"> User Admin</i></h1>
@endsection

@section('content')
    <x-status />

    <div class="card">
        <div class="card-header">
            <x-btn-create :link="route('admin.create')" />
            <x-search />
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
                                <x-btn-edit :link="route('admin.edit',['admin'=>$row->id]) />
                                <x-btn-btn-delete :link="route('admin.destroy',['admin'=>$row->id])"
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