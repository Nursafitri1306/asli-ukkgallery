<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\KomentarFoto;
use App\Models\Like;
use App\Models\Album;
use App\Models\User;
use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $album = Album::all();
        $foto = Foto::all();
        return view('admin.data-foto.index', ['foto' => $foto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $album = Album::get();
        $foto = Foto::all();
        return view ('admin.data-foto.create', compact('album', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $massages = [
            'required' => 'Silahkan isi kolom ini !',
            'max' => 'Tidak boleh lebih dari 100 karakter',
            'image' => 'Anda hanya dapat menambahkan gambar',
        ];

        $request->validate([
            'judulFoto' => 'required|max:255',
            'deskripsiFoto' => 'required|max:255',
            'lokasiFile' => 'image|required',
            'albumId' => 'required', 
        ], $massages);
        $tanggal = Carbon::now()->toDateTimeString();
        $foto = new Foto;
        $foto->judulFoto = $request->judulFoto;
        $foto->deskripsiFoto = $request->deskripsiFoto;
        $foto->lokasiFile = $request->lokasiFile;
        $foto->tanggalUnggah = $tanggal;
        $foto->albumId = $request->albumId;
        $foto['userId'] = auth()->user()->userId;

        if ($request->hasFile('lokasiFile')) {
            $files = $request->file('lokasiFile');
            $path = storage_path('app/public');
            $files_name = 'public' . '/' . date('Ymd') . '-' .
            $files->getClientOriginalName();
            $files->storeAs('public', $files_name);
            $foto->lokasiFile = $files_name;
        }

        $foto->save();

        return redirect('/admin/data-foto')->with('success', 'tambah data sukses!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $foto = Foto::where('fotoId',$id)->first();
        $like = Like::where('fotoId', $id)->count();
        $fotoId = $id;
        $komentar = KomentarFoto::where('fotoId', $id)->get();
        return view('detail.index', compact(['foto', 'like', 'fotoId', 'komentar']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(int $fotoId)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $fotoId)
{
    //
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy($fotoId)
    {
        Foto::destroy($fotoId);
        return redirect('/admin/data-foto')->with('success','Data Berhasil Dihapus');
    }
}
