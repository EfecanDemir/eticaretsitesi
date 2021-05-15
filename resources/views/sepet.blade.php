@extends('layouts.master')
@section('title','Kategori')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            {{csrf_field()}}
            @include('layouts.partials.alert')

            @if(count(Cart::content())>0)
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Adet Fiyatı</th>
                    <th>Adet</th>
                    <th>Tutar</th>
                </tr>
                @foreach(Cart::content() as $urunCartItem)
                    <tr>
                        <td style="width: 120px;">
                            <a href="{{route('urun',$urunCartItem->options->slug)}}">
                            <img src="http://via.placeholder.com/120x100?text=UrunResmi">
                            </a>
                        </td>
                        <td>
                            <a href="{{route('urun',$urunCartItem->options->slug)}}">{{$urunCartItem->name}}</a>
                        <form action="{{route('sepet.kaldir',$urunCartItem->rowId)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="submit" class="btn btn-danger btn-xs" value="Sepetten Kaldır">
                        </form>
                        </td>
                    <td>{{$urunCartItem->price}}</td>
                    <td>
                        <span style="padding: 10px 20px">{{$urunCartItem->qty}}</span>
                    </td>
                    <td class="text-right">
                        {{$urunCartItem->subtotal}} ₺
                    </td>
                </tr>
                @endforeach

                <tr>
                    <th colspan="4" class="text-right">Alt Toplam</th>
                    <td class="text-right">{{Cart::subtotal()}} ₺</td>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">KDV</th>
                    <td class="text-right">{{Cart::tax()}} ₺</td>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Genel Toplam</th>
                    <td class="text-right">{{Cart::total()}} ₺</td>
                </tr>
            </table>
                <form action="{{route('sepet.bosalt')}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input type="submit" class="btn btn-info pull-left" value="Sepeti Boşalt">
                </form>

                    <a href="{{route('odeme')}}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>

            @else
                <p>Sepette ürün bulunmamaktadır.</p>
            @endif

        </div>
    </div>
@endsection