<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'likefotos';
    protected $primaryKey = 'likeId';

    protected $fillable = ['fotoId', 'userId', 'tanggalLike'];
}
