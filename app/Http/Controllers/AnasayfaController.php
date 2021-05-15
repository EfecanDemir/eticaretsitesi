<?php
namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\UrunDetay;
use App\Models\Urun;
use App\Models\Kullanici;
use Illuminate\Http\Request;
class AnasayfaController extends Controller
{
    public function index()
    {
        $kategoriler2=Kategori::whereRaw('ust_id is null')->get();
        $urunler_slider=UrunDetay::where('goster_slider',1)->take(5)->get();
        $urunler_slider=Urun::select('urun.*')
            ->join('urun_detay','urun_detay.urun_id','urun.id')
            ->where('urun_detay.goster_slider',1)
            ->orderBy('updated_at','desc')
            ->take(8)->get();
        $urun_gunun_firsati=Urun::select('urun.*')
            ->join('urun_detay','urun_detay.urun_id','urun.id')
            ->where('urun_detay.goster_gunun_firsati',1)
            ->orderBy('updated_at','desc')
            ->first();
$urunler_one_cikan=Urun::select('urun.*')
    ->join('urun_detay','urun_detay.urun_id','urun.id')
    ->where('urun_detay.goster_one_cikan',1)
    ->orderBy('updated_at','desc')
    ->take(8)->get();
        $urunler_cok_satan=Urun::select('urun.*')
            ->join('urun_detay','urun_detay.urun_id','urun.id')
            ->where('urun_detay.goster_cok_satan',1)
            ->orderBy('updated_at','desc')
            ->take(8)->get();
        $urunler_indirimli=Urun::select('urun.*')
            ->join('urun_detay','urun_detay.urun_id','urun.id')
            ->where('urun_detay.goster_indirimli',1)
            ->orderBy('updated_at','desc')
            ->take(8)->get();



        return view('anasayfa',
            compact('kategoriler2',
                'urunler_slider',
                'urun_gunun_firsati',
                'urunler_one_cikan',
                'urunler_cok_satan',
                'urunler_indirimli'
                ));
    }
}