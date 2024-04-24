@extends('layouts.app')

@section('content')

    <div class="col-12 col-md-6 col-lg-12">
        <div class="row justify-content-center mb-1">
        <div class="card col-lg-9 border border-primary">
            @if(session()->has('success'))
                <div class="alert alert-success show fade mt-2">
                    <div class="alert-body">
                    {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="p-1 bg-white text-dark text-center mt-2">
            <strong>Gambar {{ $foto->judul }}</strong>
            </div>
            <div class="row g-0">
            <div class="col-md-2">
                <div class="mt-4">
                <img src="{{ asset('storage/'. $foto->image) }}" class="img-fluid rounded-start mt-3" style="" alt="image">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body ml-3">
                <table>
                    <tr>
                    <td>Nama Foto &nbsp;</td>
                    <td>:&nbsp;</td>
                    <td>{{ $foto->judul }}</td>
                    </tr>
                    <tr>
                    <td>Album</td>
                    <td>:&nbsp;</td>
                    <td>{{ $foto->album->nama }}</td>
                    </tr>
                    <tr>
                    <td>Deskripsi</td>
                    <td>:&nbsp;</td>
                    <td>{{ $foto->deskripsi }}</td>
                    </tr>
                </table>
                </div>
            </div>
                {{-- <div class="d-flex justify-content-center">
                <small class="text-body-secondary">Post By {{ $foto->user->nama }}</small>
                </div> --}}
            </div>
            </div>
        </div>
   
        </div>
    </div>
@endsection