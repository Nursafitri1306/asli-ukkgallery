<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Foto;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $foto = Foto::join('albums', 'albums.albumId', '=', 'fotos.albumId')->get();
        return view('gallery.index', compact('foto'));
    }

}
