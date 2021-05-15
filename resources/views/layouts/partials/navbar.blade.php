<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('anasayfa')}}">
                <img src="/img/logo.png">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" action="{{route('urun_ara')}}" method="post">
                {{csrf_field()}}
                <div class="input-group">
                    <input type="text" name="aranan" id="navbar-search" class="form-control" placeholder="Ara" value="{{old('aranan')}}">
                    <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <IFRAME SRC="http://www.cilekweb.com/webaraclar/bursa.asp" WIDTH=175 HEIGHT=109 MARGINWIDTH=0 MARGINHEIGHT=0 HSPACE=0 FRAMEBORDER=0 SCROLLING=NO name="I1" align="center"></IFRAME>
                <script language="javascript" src="hava.js" tppabs="http://in.sitekodlari.com/hava.js"></script>
                <li><a href="{{route('sepet')}}"><i class="fa fa-shopping-cart"></i> Sepet <span class="badge badge-theme">{{Cart::count()}}</span></a></li>
                @guest()
                <li><a href="{{route('kullanici.oturumac')}}">Oturum Aç</a></li>
                <li><a href="{{route('kullanici.kaydol')}}">Kaydol</a></li>
                @endguest
                @auth()





                    <script>
                        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                    </script>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Profil <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('siparisler')}}">Siparişlerim</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Çıkış</a>
                            <form id="logout-form" action="{{route('kullanici.oturumukapat')}}" method="post" style="display:none">
                                {{csrf_field()}}
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>