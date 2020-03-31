<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    public function berita(){
        $this->hasOne('App\Berita');
    }
}
