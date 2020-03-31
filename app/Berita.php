<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    public function galeri(){
        $this->belongsTo('App\Galeri','id_galeri','id');
    }
}
