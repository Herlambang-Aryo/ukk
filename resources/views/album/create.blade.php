@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Album</div>
                        <!-- form start -->
                    {{ html()->form('POST', route('album.store'))->open() }}
                    <div class="card-body">
                        @include('album.form')
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" dusk="create-album" id="save">Simpan</button> 
                        <a href="{{ route('album.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                    {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    
@endpush