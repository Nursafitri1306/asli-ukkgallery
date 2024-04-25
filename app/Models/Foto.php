<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $table = 'fotos';
    protected $primaryKey = 'fotoId';

    protected $fillable = ['judulFoto', 'deskripsiFoto', 'tanggalUnggah', 'lokasiFile', 'albumId', 'userId'];

    public function user(){
        return $this->belongsTo(User::class, 'userId');
    }
    public function album()
    {
        return $this->belongsTo(Album::class, 'albumId');
    }

    public function komentar()
    {
    return $this->hasMany(KomentarFoto::class, 'fotoId');
    }
    public function like()
    {
    return $this->hasMany(Like::class, 'fotoId');
    }
}
