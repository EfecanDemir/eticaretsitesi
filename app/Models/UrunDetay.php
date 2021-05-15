<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Urun;
class UrunDetay extends Model
{
    protected $table="urun_detay";
    protected $guarded=[];
    public $timestamps=false;
    public function urunler()
    {
        return $this->hasOne('App\Models\Urun');
    }

}
