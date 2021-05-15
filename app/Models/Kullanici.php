<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Sepet;
class Kullanici extends Authenticatable
{
    use SoftDeletes;
    protected $table="kullanici";
    protected $fillable = ['adsoyad', 'email', 'sifre','aktivasyon_anahtari','yonetici_mi'];

    protected $hidden = ['sifre', 'aktivasyon_anahtari'];

    public function getAuthPassword()
    {
        return $this->sifre;
    }

    public function  detay()
    {
        return $this->hasOne('App\Models\KullaniciDetay')->withDefault();
    }
}
