<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kitabs extends Model
{
    //
    protected $fillable = [
        'kategori', 'judul_buku', 'sampul','link',
    ];
    public $timestamps = false;
}
