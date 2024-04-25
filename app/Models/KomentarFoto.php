<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarFoto extends Model
{
    use HasFactory;
    protected $table = 'komentarfotos';
    protected $primaryKey = 'komentarId';

    protected $fillable = [
        'isiKomentar',
        'tanggalKomentar',
        'fotoId',
        'userId',
    ];

    protected $guarded = ['komentarId'];

    protected $dates = ['tanggalKomentar'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function foto()
    {
        return $this->belongsTo(Photo::class, 'fotoId');
    }
}
