@extends('layouts.tamu', ['title' => 'Home'])

@section('content')
    <div style="position: relative">
        <img src="{{ asset('images/background.jpg') }}" alt="background" class="img-fluid"
            style="width: 100%; height:620px; filter: brightness(0.5);">
    </div>
    <div>
        <h1 style="position: absolute; margin-left:250px; margin-top:180px; top: 0; font-size: 70px; color: #fff; padding:10%;"
            class="text-center pt-3 pb-5">Selamat
            Datang di
            <br><span><strong>Angkringan
                    Peteng</strong></span>
        </h1>
    @endsection
