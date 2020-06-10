<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifKapal extends Model
{
    protected $table = "pbd_tarif";
    protected $fillable = ['id_kapal','kelas','jenis_usia','harga'];
    public $timestamps = false;
}
