<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SepetUrun extends Model
{
    use SoftDeletes;

    protected $table="sepet_urun";
    protected $guarded=[];
    public function urun()
    {
    return $this->belongsTo('App\Models\Urun');
    }
}
