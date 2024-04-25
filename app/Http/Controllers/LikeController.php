<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(String $id)
    {
        if (auth()->check()) {
            $like = Like::where('fotoId', $id)->where('userId', auth()->user()->userId)->first();
            if ($like) {
                $like->delete();
            } else {
                $tanggal = Carbon::now()->toDateTimeString();
                $like = new Like();
                $like->fotoId = $id;
                $like->userId = auth()->user()->userId;
                $like->tanggalLike = $tanggal;
                $like->save();
            }
            return back();
        } else {
            // Redirect user to login page if not authenticated
            return redirect()->with('error', 'Anda harus login untuk memberikan suka.');
        }
    }
}
