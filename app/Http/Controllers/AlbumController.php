<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
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
        return view('admin.album.index', ['album' => $album]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Silahkan isi kolom ini!'
        ];
        $validatedData = $request->validate([
            'namaAlbum' => 'required|max:255', 
            'deskripsi' => 'required|max:255', 
        ],$message
        
    );
    $tanggal = Carbon::now()->toDateTimeString();
        
        // insert data ke database
        $album = new Album;
        $album->namaAlbum = $validatedData['namaAlbum'];
        $album->deskripsi = $validatedData['deskripsi'];
        if(Auth::check()){
        $album->userId = $validatedData['userId'] = auth()->user()->userId;
        }
        $album->tanggalDibuat = $tanggal;
        $album->save();
        

        return redirect('/admin/album')->with('success', 'Kategori baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(int $albumId)
    {
    $album = Album::where('albumId', $albumId)->first();
        
    // Periksa jika album ditemukan
    if (!$album) {
        abort(404); // Tampilkan halaman 404 jika album tidak ditemukan
    }

    return view('/admin/album/edit', compact(['album']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $albumId)
    {
        $tanggal = Carbon::now()->toDateTimeString();
        $album = Album::where('albumId', $albumId)->first();
        $album->namaAlbum = $request->namaAlbum;
        $album->deskripsi = $request->deskripsi;
        
        if (Auth::check()) {
            $album->userId = auth()->user()->userId;
        }
        
        $album->save();
        
        return redirect('/admin/album')->with('success', 'Album telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($albumId)
    {
        Album::destroy($albumId);
        return redirect('/admin/album')->with('success','Data Berhasil Dihapus');
    }
}
