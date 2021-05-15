@extends('layouts.master')
@section('title','Kaydol')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Kaydol</div>
                    <div class="panel-body">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                            @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{route('kullanici.kaydol')}}">
                            {{csrf_field()}}
                            <div class="form-group has-error">
                                <label for="name" class="col-md-4 control-label">Ad Soyad</label>
                                <div class="col-md-6">
                                    <input id="adsoyad" type="text" class="form-control" name="adsoyad" value="" required autofocus>
                                    <span class="help-block">
                                        <strong>Kullanıcı adı boş bırakılamaz</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Şifre</label>
                                <div class="col-md-6">
                                    <input id="sifre" type="password" class="form-control" name="sifre" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sifre-tekrari" class="col-md-4 control-label">Şifre (Tekrar)</label>
                                <div class="col-md-6">
                                    <input id="sifre-tekrari" type="password" class="form-control" name="sifre_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Kaydol
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection