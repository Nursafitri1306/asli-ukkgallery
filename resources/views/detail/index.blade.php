@extends('layout.main')
@section('container')

<div class="container py-5">
      <div class="col-lg-8">
        <div class="d-flex flex-column text-left mb-3">
          <h1 class="mb-3">{{ $foto->judulFoto }}</h1>
        </div>
        <div class="mb-5">
          <img class="card-img-top mb-2" src="{{ asset('storage/' . $foto->lokasiFile) }}" alt="" style="width: 400px;" />
          <div class="d-flex mb-3">
            <p class="mr-3"><i class="bi bi-person-fill"></i> {{ $foto->user->namaLengkap }}</p>
            <p class="mr-3"><i class="bi bi-folder-fill"></i> {{ $foto->namaAlbum }}</p>
            <p class="mr-3 like-icon"><a href="/detail/{{$foto->fotoId}}/like"><i class="bi bi-heart">{{$like}}</i></a></p>
            <p class="mr-3"><i class="bi bi-chat-fill"></i>{{ $foto->comments_count }}</p>
          </div>  
          <p>{{ $foto->deskripsiFoto }}</p>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card" style="margin-top: 20px;">
              <div class="card-header">
                Komentar
              </div>
              <div class="card-body">
                @foreach ($komentar as $singleComment)
                <div class="card mb-3">
                  <div class="card-body">
                    <h5 class="card-title">Nama: <b>{{ $singleComment->user->namaLengkap }}</b></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Komentar: <b>{{ $singleComment->isiKomentar }}</b></h6>
                  </div>
                </div>
                @endforeach              
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card-body p-4">
              <form id="commentForm" method="post" action="/detail/{{ $fotoId }}" class="mb-5">
                @csrf
                <div class="text-center ml-5 mr-5">
                  <h5><b><p style="font-family:Perpetua; margin-top:20px;">Komentar</p></b></h5>
                </div>
                <small style="line-height:5px"></small>
                <div class="form-floating mb-3">
                  <textarea class="form-control @error('isiKomentar') is-invalid @enderror" id="isiKomentar" name="isiKomentar" style="height: 100px" required data-parsley-trigger="keyup">{{ old('isiKomentar') }}</textarea>
                  @error('isiKomentar')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
    
                <div class="form-floating mb-3">
                  <button type="submit" class="btn btn-primary custom-button">Kirim</button>
                </div>
              </form>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
