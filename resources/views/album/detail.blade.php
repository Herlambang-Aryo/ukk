@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Album</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td>ID</td>
                                <td>{{ $album->id }}</td>
                            </tr>
                            <tr>
                                <td>Nama Album</td>
                                <td>{{ $album->nama }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi Album</td>
                                <td>{{ $album->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Unggah</td>
                                <td>{{ $album->tgl_diunggah }}</td>
                            </tr>
                        </table>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->

                <div class="card mt-3">
                    <div class="card-header">Foto dalam Album</div>
                    <div class="card-body">
                        {{-- @foreach ($album->foto as $photo)
                            <img src="{{ asset('storage/' . $photo->image) }}" alt="Foto"
                                class="img-thumbnail mr-2 mb-2" width="100px">
                        @endforeach --}}
                    </div>
                </div>
            </div> <!-- /.col-md-8 -->
        </div>
    </div>
@endsection

@push('scripts')
@endpush