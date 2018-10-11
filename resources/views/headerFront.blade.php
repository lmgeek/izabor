<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" @if (config('voyager.multilingual.rtl')) dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="iZabor - Opción que complace su paladar">
    <meta name="og:description" content="Pide comida a domicilio con iZabor. Tus menús favoritos a solo unos clics de distancia y sin salir de casa. Tú pides, nosotros lo llevamos.">
    <title>
        @if( isset($product) )
            iZabor | {{ ucwords($product->name) }}
        @elseif( Route::getFacadeRoot()->current()->uri() == '/' )
            iZabor | {{ __('general.headerTitle') }}
        @else
            iZabor | {{ Route::getFacadeRoot()->current()->uri() }}
        @endif
    </title>
    <link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet" >
    {{--<link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    @if (config('voyager.multilingual.rtl'))
        {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">--}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>--}}
    <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.css">
    {{--<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <script>
            @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
</head>
<body>
{{-- App Download --}}
<div class="smart_banner smart_banner_top smart-banner-top closed">
    <div class="left_content">
        <a href="javascript:void(0)" class="btn_close close">Cerrar</a>
        <img src="{{ asset('images/logo.png') }}" alt="iZabor" title="iZabor">
        <div class="content_info">
            <span class="text">iZabor <span>Food Delivery</span></span>
            <img src="https://live.pystatic.com/webassets/mobile/smart-banner/top-banner/stars_banner_top-b0346c1925f764e8bec2ffa9f79d9293.png" alt="" title="">
        </div>
    </div>
    <a class="btn_download smart_banner_download" href="https://play.google.com/store/apps/developer?id=Luis+Armando+Mar%C3%ADn" data-big="Descargar gratis" data-small="Descargar gratis iZabor">
        Descargar
    </a>
</div>

<style>
    .navigation-header.header.scroll, body.keep-navbar-visible .navigation-header.header {
        background-image: none;
        transition: background-color .125s ease-in;
        background-color: #ef3040;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,.16);
    }
    .navigation-header.header {
        justify-content: space-evenly;
    }
    .navigation-header.header {
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-between;
        z-index: 2;
        position: fixed;
        top: 0;
        left: 0;
        height: 5rem;
        transition: background-color .125s ease-out;
        background-color: transparent;
    }
    .sidebar__button {
        margin-right: 5.6rem;
        margin-left: 5.6rem;
    }
    .sidebar__button {
        display: flex;
        height: 5rem;
        align-items: center;
    }
    .main-header__hamburger {
        cursor: pointer;
        margin-left: 1.6rem;
        overflow: visible;
    }
    .navigation-header.header .left-side {
        display: flex;
        align-items: center;
        width: 50%;
    }
    header__image-container {
        cursor: pointer;
        display: flex;
        justify-content: center;
        z-index: 2;
    }
    header__image-container {
        cursor: pointer;
        display: flex;
        justify-content: center;
        z-index: 2;
    }
    .navigation-header.header .right-side {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-right: 2.2rem;
        margin-left: 5rem;
        width: calc(50% - 7.2rem);
    }
    .navigation-header.header .right-side .search-establishments, .navigation-header.header .right-side .search-products {
        display: block;
        position: relative;
        right: 0;
    }
    .navigation-header.header .search-establishments, .navigation-header.header .search-products {
        font-size: 2.2rem;
        z-index: 2;
        cursor: pointer;
        margin-right: 1.6rem;
    }
    .navigation-header.header .right-side .promos-link, .navigation-header.header .right-side .support-link {
        z-index: 2;
        height: 2.2rem;
        font-size: 1rem;
        font-weight: 600;
        color: #fff;
    }
    .navigation-header.header .right-side .login-section {
        z-index: 2;
        cursor: pointer;
        height: 2.2rem;
        font-size: 1rem;
        font-weight: 700;
        color: #fff;
    }
    .main-header__hamburger {
        cursor: pointer;
    }

    .cart-count {
        display: inline-block;
        background: #FFD94D;
        color: #212121;
        line-height: 0;
        border-radius: 50%;
        font-size: 14px;
    }
    .cart-count span {
        display: inline-block;
        padding-top: 50%;
        padding-bottom: 50%;
        margin-left: 6px;
        margin-right: 6px;
    }
    ul li {
            list-style: none;
    }
    .fa-sign-out-alt, .fa-user-circle {
        font-size: 20px;
        color: #ef3040;
    }
    .menu-dropdown li {
        margin: 10px;
        font-weight: 600;
        color: #ef3040;
    }

</style>

<div class="navigation-header header scroll">
    <div class="sidebar__button">
        <svg class="main-header__hamburger" xmlns="http://www.w3.org/2000/svg" width="17" height="16"
             viewBox="0 0 17 16">
            <g fill="#FFF" fill-rule="evenodd">
                <rect width="17" height="2" rx="1"></rect>
                <rect width="17" height="2" y="7" rx="1"></rect>
                <rect width="17" height="2" y="14" rx="1"></rect>
            </g>
        </svg>
    </div>
    <div class="left-side">
        <section class="header__image-container">
            <a href="/">
                <img class="main-header__image" src="{{ asset( 'images/logo.png' ) }}" alt="iZabor.com logo" style="max-width: 11%"> </a>
            {{-- <h1 class="back-text"></h1> --}}
        </section>
    </div>
    <i class="icon icon-search search-establishments"></i>
    <div class="right-side"><i class="icon icon-search search-establishments"></i>
        
{{--         @if (Auth::guest())
            <a href="/login" class="login-section">Iniciar sesión</a>
        @else
            <a href="/panel" class="login-section">Mi Cuenta</a>
        @endif --}}
        <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item" style="margin-right: 20px">
                            <a class="support-link" href="/contacto">Soporte</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="login-section" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle login-section" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="padding: 10px">
                                    <ul class="menu-dropdown">
                                        <li>
                                            <i class="far fa-user-circle"></i> <a href="/panel" class="dropdown-item">Mi Cuenta</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                            </a>
                                        </li>
                                    </ul>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
        <a href="/cart" class="ghost"><i class="fas fa-shopping-cart"></i> <span class="cart-count">
            <span>{{ Cart::instance('default')->count() }}</span></span>
        </a>
    </div>
</div>
<header id="header" class="fixed-header " style="">
    <div class="row left-align">
        <section id="showMenu" class="menu-trigger">
            <a href="javascript:void(0);">
                <span>Menú</span>
            </a>
        </section>
    </div>
    <div id="logo" class="">iZabor</div>
    <div class="row right-align">
        <section id="login" class="login-trigger">
            {{--<a href="registerLogin" class="ghost">--}}
            {{--<span>Ingresar</span>--}}
            {{--</a>--}}
            <a href="/cart" class="ghost"><i class="fas fa-shopping-cart"></i> <span class="cart-count">
                <span>{{ Cart::instance('default')->count() }}</span></span>
            </a>
        </section>
    </div>
</header>

{{-- Menu header --}}
{{--<nav class="navbar navbar-default navbar-fixed-top">--}}
{{--<div class="container">--}}
{{--<div class="navbar-header">--}}

{{--<ul class="nav navbar-nav navbar-right navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"--}}
{{--aria-expanded="false" aria-controls="navbar">--}}
{{--<li><a href="/cart"><i class="fas fa-shopping-cart"></i> Carrito<span class="sr-only">(current)</span></a></li>--}}
{{--</ul>--}}
{{--<a class="navbar-brand" href="/">iZabor</a>--}}
{{--<a class="navbar-brand" href="{{  Config::get ('app.url')  }}">iZabor</a>--}}
{{--</div>--}}
{{--<div id="navbar" class="navbar-collapse collapse">--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li><a href="/cart"><i class="fas fa-shopping-cart"></i> Carrito<span class="sr-only">(current)</span></a></li>--}}
{{--</ul>--}}
{{--</div><!--/.nav-collapse -->--}}
{{--</div>--}}
{{--</nav>--}}
{{-- End menu header --}}
