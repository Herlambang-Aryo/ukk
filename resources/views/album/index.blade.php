@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Album') }}</div>
 
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('success') }}
                    </div>
                    @endif
 
                    @if($album->count())
                    <a href="/album/create" class="btn btn-primary mb-3">Tambah Album Baru</a>
                    <table class="table table-responsive table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Judul Album</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Tanggal Unggah</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($album as $al)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $al->nama }}</td>
                                <td>{{ $al->deskripsi }}</td>
                                <td>{{ str_replace(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'], ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'], $al->created_at->timeZone('Asia/Jakarta')->format('l, d F Y')) }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        {{-- <a href="/album/{{ $al->name }}" class="btn btn-primary">Detail</a>
                                        <a href="/album/{{ $al->id }}/edit" class="btn btn-warning">Edit</a> --}}
                                        <a href="/album/{{ $al->id }}" class="btn btn-primary">Detail</a> 
                                        <a href="{{route('album.edit', $al->id)}}" class="btn btn-warning">Edit</a> 
                                        <form action="{{ route('album.destroy', $al->id) }}" method="POST" class="btn-group">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="d-flex justify-content-center">
                        <h5>Album Tidak Ditemukan. <a href="/album/create" class="text-decoration-none">Tambah Album</a></h5>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection