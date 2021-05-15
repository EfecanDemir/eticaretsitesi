<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Siparis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class AnasayfaController extends Controller
{
    public function index()
    {

        return view('yonetim.anasayfa');

    }
}
