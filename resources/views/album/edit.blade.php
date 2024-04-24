@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Album</div>
                        <!-- form start -->
                        {{ html()->modelForm($album, 'PUT', route('album.update', [$album->id]))->open() }}
                    <div class="card-body">
                        @include('album.form')
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" dusk="update-city" id="save">Update</button>
                        <a href="{{ route('album.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                        {{ html()->closeModelForm() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    
@endpush