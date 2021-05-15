<?php

namespace App\Http\Controllers;
use App\Models\Kullanici;
use App\Mail\KullaniciKayitMail;
use App\Models\KullaniciDetay;
use App\Models\Sepet;
use App\Models\SepetUrun;
use Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class KullaniciController extends Controller
{
    public function giris_form()
    {
        return view('kullanici.oturumac');
    }
    public function kaydol_form()
    {
        return view('kullanici.kaydol');
    }
    public function giris()
    {
        $this->validate(request(),[
            'email'=>'required|email',
            'sifre'=>'required'
        ]);
        if(auth()->attempt(['email'=>request('email'),'password'=>request('sifre')],request()->has('benihatirla')))
        {
            request()->session()->regenerate();
            $aktif_sepet_id=Sepet::firstOrCreate(['kullanici_id'=>auth()->id()])->id;
            if(!is_null($aktif_sepet_id))
            {
                $aktif_sepet=Sepet::create([
                   'kullanici_id'=>auth()->id()
                ]);
                $aktif_sepet_id=$aktif_sepet->id;
            }
            session()->put('aktif_sepet_id',$aktif_sepet_id);

            if(Cart::count()>0)
            {
                foreach (Cart::content() as $cartItem)
                {
                    SepetUrun::updateOrCreate(
                        ['sepet_id'=>$aktif_sepet_id,'urun_id'=>$cartItem->id],
                        ['adet'=>$cartItem->qty,'fiyati'=>$cartItem->price,'durum'=>'Beklemede']
                    );
                }
            }
            Cart::destroy();
            $sepetUrunler=SepetUrun::where('sepet_id',$aktif_sepet_id)->get();
            foreach($sepetUrunler as $sepetUrun)
            {
                Cart::add($sepetUrun->urun->id,$sepetUrun->urun->urun_adi,$sepetUrun->adet,$sepetUrun->fiyati,['slug'=>$sepetUrun->urun->slug]);
            }

            return redirect()->intended('/');
        }
        else
        {
            $errors=['email'=>'Hatalı giriş'];
            return back()->withErrors($errors);
        }
    }
    public function abc()
    {
        $this->validate(request(),[
            'adsoyad'=>'required|min:5|max:60',
            'email'=>'required|email|unique:kullanici',
            'sifre'=>'required|confirmed|min:5|max:15'
        ]);
        $kullanici= Kullanici::create([
            'adsoyad'=>request('adsoyad'),
            'email'=>request('email'),
            'sifre'=>Hash::make(request('sifre')),
            'aktivasyon_anahtari'=>Str::random(10)
        ]);
        $kullanici->detay()->save(new KullaniciDetay());

        Mail::to(request('email'))->send(new KullaniciKayitMail($kullanici));
        auth()->login($kullanici);
        return redirect()->route('anasayfa');
    }
    public function oturumukapat()
    {
    auth()->logout();
    request()->session()->flush();
    request()->session()->regenerate();
    return redirect()->route('anasayfa');
    }
}
