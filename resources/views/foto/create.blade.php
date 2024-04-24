@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tambah Foto') }}</div>
 
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('success') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('foto.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="judul" class="col-md-3 col-form-label text-md-end">{{ __('Judul Foto') }}</label>
                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror"   name="judul" value="{{ old('judul') }}" required autocomplete="judul" autofocus>
                                @error('judul') 
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror
                            </div>
                        </div>
 
                        <div class="row mb-3">
                            <label for="title" class="col-md-3 col-form-label text-md-end">{{ __('Pilih Album') }}</label>
                            <div class="col-md-6">
                                <select name="album_id" class="form-control" required>
                                    <option selected disabled hidden>Pilih Album</option>
                                    @foreach ($album as $al)
                                        @if (old('album_id') == $al->id)
                                            <option value="{{ $al->id }}" selected>{{ $al->nama }}</option>
 
                                        @else
                                            <option value="{{ $al->id }}" >{{ $al->nama }}</option>
                                        @endif
                                        @endforeach
                                </select>
                            </div>
                        </div>
 
                        {{-- <div class="row mb-3 dropdown">
                            <label for="title" class="col-md-3 col-form-label text-md-end">{{ __('Pilih Album') }}</label>
                            <div class="col-md-6">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown button
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($album as $al)
                                    @if (old('album_id') == $al->id)
                                        <option value="{{ $al->id }}" selected>{{ $al->name }}</option>
 
                                    @else
                                        <option value="{{ $al->id }}" >{{ $al->name }}</option>
                                    @endif
 
                                    <li class="dropdown-item" value="{{ $po->id }}">{{ $po->name }}</li>
 
                                    @endforeach
                                </ul>
                            </div>
                        </div> --}}
 
                        <div class="row mb-3">
                            <label for="image" class="col-md-3 col-form-label text-md-end">{{ __('Pilih Foto') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"   name="image" value="{{ old('image') }}" required autocomplete="image" accept="image/jpg, image/jpeg, image/png" autofocus>
                                @error('image') 
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror
                            </div>
                        </div>
 
                        <div class="row mb-3">
                            <label for="deskripsi" class="col-md-3 col-form-label text-md-end">{{ __('Deskirpsi') }}</label>
                            <div class="col-md-6">
                                <input id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror"       name="deskripsi" value="{{ old('deskripsi') }}" required autocomplete="deskripsi" autofocus>
                                @error('deskripsi') 
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror
                            </div>
                        </div>
 
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection