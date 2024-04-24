@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Foto') }}</div>
 
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('success') }}
                    </div>
                    @endif
 
                    @if($foto->count())
                    <a href="/foto/create" class="btn btn-primary mb-3">Tambah Foto Baru</a>
                    <table class="table table-responsive table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Judul Foto</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($foto as $p)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->judul }}</td>
                                <td>
                                    <img src="{{ asset('storage/'. $foto->image) }}" class="img-fluid rounded-start mt-3" style="max-width: 50px" alt="image">
                                </td>
                                <td>{{ $p->deskripsi }}</td>
                                <td>{{ str_replace(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'], ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'], $p->created_at->timeZone('Asia/Jakarta')->format('l, d F Y')) }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="/foto/{{ $p->id }}" class="btn btn-primary">Detail</a>
                                        <a href="/foto/{{ $p->id }}/edit" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('foto.destroy', $p->id) }}" method="POST" class="btn-group">
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
                        <h5>Foto Tidak Ditemukan. <a href="/foto/create" class="text-decoration-none">Tambah Foto</a></h5>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection