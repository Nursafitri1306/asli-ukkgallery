@extends('admin.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Form Edit</h4>
            </div>
            <form method="post" action="/admin/data-foto/{{$foto->fotoId}}" class="mb-5" enctype="multipart/form-data">
            @method('PUT')
            @csrf

        <div class="card-body">
            <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Foto</label>
                <div class="col-sm-12 col-md-7">
            <input type="text" name="judulFoto" class="form-control" required value="{{old('judulFoto', $foto->judulFoto)}}">
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Foto</label>
            <div class="col-sm-12 col-md-7">
                <input type="text" name="deskripsiFoto" class="form-control" required value="{{old('deskripsiFoto', $foto->deskripsiFoto)}}">
                </div>
                </div>
                <div class="card-body">
                <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi File</label>
                <div class="col-sm-12 col-md-7">
                <input type="text" name="lokasiFile" class="form-control" required value="{{old('lokasiFile', $foto->lokasiFile)}}">
                </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album Id</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="albumId" class="form-control selectric">
                       <option disable value="">Pilih Album</option>
                       @foreach ($album as $item)
                           <option value="{{ $item->albumId }}">{{ $item->namaAlbum }}</option>
                       @endforeach
                      </select>
                    </div>
                  </div>
              <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button class="btn btn-primary">Ubah</button>
            </div>
          </div>
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection