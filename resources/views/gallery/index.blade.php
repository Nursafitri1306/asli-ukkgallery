@extends('layout.main')
@section('container')
  <div class="album py-5 bg-body-tertiary">
    <div class="container">
    <div class="row pb-3">
      @foreach ($foto as $foto)
      <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm mb-2">
          <img class="card-img-top mb-2" src="{{asset('storage/'.$foto->lokasiFile)}}" alt="" style="width: 100%;" />
          <div class="card-body bg-light text-center p-4">
            <h4>{{$foto->judulFoto}}</h4>  
            <a href="/detail/{{$foto->fotoId}}" class="btn btn-outline-secondary">View</a>
          </div>
        </div>
      </div>
      @endforeach
      </div>
    </div>
  </div>
@endsection