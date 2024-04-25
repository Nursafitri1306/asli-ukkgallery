@extends('admin.main')
@section('content')

<div class="card">
    <div class="card-header">
        <a href="/admin/data-foto/create" class="btn btn-icon icon-left btn-success"><i class="far fa-edit"></i> Tambah Foto </a>
    </div>
        <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Foto</th>
                <th scope="col">Deskripsi Foto</th>
                <th scope="col">Tanggal Unggah</th>
                <th scope="col">Lokasi File</th>
                <th scope="col">Album ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($foto as $foto)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$foto->judulFoto}}</td>
              <td>{{$foto->deskripsiFoto}}</td>
              <td>{{$foto->tanggalUnggah}}</td>
              <td>{{$foto->lokasiFile}}</td>
              <td>{{$foto->albumId}}</td>
              <td>{{$foto->userId}}</td>
              <td>
                <div class="btn-group" role="group">
                    <form action="/admin/data-foto/{{ $foto->fotoId }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-outline-danger" onclick="return confirm('Yakin akan dihapus??')"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
                </td>
            </tr>
            @endforeach
            </tbody>    
        </table>
        </div>
</div>
@endsection
