<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(String $id){
        $like = Like::where('fotoId', $id)->where('userId', auth()->user()->userId)->first();
        if ($like) {
            $like->delete();
            return back();
        } else {
            $tanggal = Carbon::now()->toDateTimeString();
        // dd($id);
            $like = new Like();
            $like->likeId = $id;
            $like->userId = auth()->user()->userId;
            $like->tanggalLike = $tanggal;
            $like->save();
            return back();
        }
    }
}
