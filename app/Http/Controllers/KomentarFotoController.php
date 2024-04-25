<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomentarFotoController extends Controller
{
    public function storeComment(Request $request, String $id)
    {
        $validatedData = $request->validate([
            'isiKomentar' => 'required'
        ]);
        
    
        if(Auth::check()) {
            $user = Auth::user();
            $komentar = new KomentarFoto();
            $komentar->fotoId = $id;
            $komentar->isiKomentar = $request->isiKomentar;
            $komentar->tanggalKomentar = now(); 
            $komentar->userId = auth()->user()->userId;
            $komentar->save();
    
            return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
        } 
        }
}
