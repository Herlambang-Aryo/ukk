<div class="row mb-3">
    <label for="nama" class="col-md-4 col-form-label text-md-end">Nama Album</label>

    <div class="col-md-6">
        {{ html()->text('nama')->class("form-control")->autofocus() }}    

        @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="deskripsi" class="col-md-4 col-form-label text-md-end">Deskripsi</label>

    <div class="col-md-6">
        {{ html()->textarea('deskripsi')->class("form-control") }}    

        @error('deskripsi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>