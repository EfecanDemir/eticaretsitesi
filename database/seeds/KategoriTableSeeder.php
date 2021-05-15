<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('kategoriler')->truncate();
        $id=DB::table('kategoriler')->insertGetId(['kategori_adi'=>'Elektronik','slug'=>'elektronik']);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Bilgisayar/Tablet','slug'=>'bilgisayar-tablet','ust_id'=>$id]);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Telefon','slug'=>'telefon','ust_id'=>$id]);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Televizyon','slug'=>'televizyon','ust_id'=>$id]);

        $id=DB::table('kategoriler')->insert(['kategori_adi'=>'Kitap','slug'=>'kitap']);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Roman','slug'=>'roman','ust_id'=>$id]);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Macera','slug'=>'macera','ust_id'=>$id]);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Aşk','slug'=>'ask','ust_id'=>$id]);

        $id=DB::table('kategoriler')->insert(['kategori_adi'=>'Dergi','slug'=>'dergi']);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Bilim Kurgu','slug'=>'bilim-kurgu','ust_id'=>$id]);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Edebiyat','slug'=>'edebiyat','ust_id'=>$id]);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Spor','slug'=>'spor','ust_id'=>$id]);

        $id=DB::table('kategoriler')->insert(['kategori_adi'=>'Mobilya','slug'=>'mobilya']);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Masa','slug'=>'masa','ust_id'=>$id]);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Sandalye','slug'=>'sandalye','ust_id'=>$id]);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Dolap','slug'=>'dolap','ust_id'=>$id]);

        $id=DB::table('kategoriler')->insert(['kategori_adi'=>'Kozmetik','slug'=>'kozmetik']);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Makyaj','slug'=>'makyaj','ust_id'=>$id]);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Kişisel Bakım','slug'=>'kisisel-bakim','ust_id'=>$id]);
        DB::table('kategoriler')->insert(['kategori_adi'=>'Saç Bakımı','slug'=>'sac-bakim','ust_id'=>$id]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
