@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-18">
                <div class="card">
                    <div class="card-header">{{ __('Photo Gallery') }}
                        @auth
                            <a href="{{ route('foto.create') }}" class="btn btn-primary btn-sm float-end"><i
                                    class="bi bi-card-image"></i>Tambah Foto</a>
                        @endauth
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @auth
                            @if ($foto->isEmpty())
                                <p>Belum Ada Foto Yang Diupload</p>
                            @else
                                <div class="row mt-4">
                                    @foreach ($foto as $foto)
                                        <div class="col-md-3">
                                            <div class="card mb-4">
                                                <img src="{{ asset('storage/' . $foto->image) }}" class="card-img-top"
                                                    alt="..." width="20px" height="190px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $foto->judul_foto }}</h5>
                                                    <p class="card-text">{{ $foto->deskripsi_foto }}</p>
                                                    {{--    <p class="card-text">Uploaded by: {{ $foto->user->nama }}</p> --}}
                                                    <div class="card-footer">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endauth
                        @guest
                            @if (Route::has('login'))
                                <div class="card-body">
                                    <h3 class="text-center">Selamat Datang Di Website Galeri Foto</h3>
                                    <p class="text-center">Silahkan Login & Register Dahulu Agar Dapat Mengakses Website</p>
                                </div>
                            @endif
                        @endguest

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush --}}