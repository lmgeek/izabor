@include('headerFront')
<style>
    body {
        background-image: url('{{ asset("images/0W8A1835.jpg") }}');
        background-color: {{ Voyager::setting("admin.bg_color", "#FFFFFF" ) }};
    }

    @media (max-width: 767px) {
        body.login .login-sidebar {
            border-top: 0px !important;
            border-left: 5px solid{{ config('voyager.primary_color','#22A7F0') }};
        }
    }

    body.login .form-group-default.focused {
        border-color: {{ config('voyager.primary_color','#22A7F0') }};
    }

</style>

</head>
<body class="login">


<div class="container-fluid">
    <div class="row">
        <div class="faded-bg animated"></div>
        <div class=" col-sm-7 col-md-8">
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
                    <div class="logo-title-container">

                        <div class="copy animated fadeIn text-center">
                            <h1>¿Qué estás buscando?</h1>
                            <p>Pide tu delivery ahora mismo</p>
                            <div class="form-group form-group-default" id="searchGroup" style="width: 80%;">
                                <div class="controls">
                                    <input type="text" name="search" id="search" value=""
                                           placeholder="{{ __('general.search_ppal') }}" width="50%"
                                           class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block search-button">
                                <span class="search">Buscar</span>
                            </button>
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>


    </div> <!-- .row -->
</div> <!-- .container-fluid -->
<div>


    {{-- Productos --}}
    <div class="container">
        <br><br>
        <div class="row">
            <h1 class="text-center">Sugerendias del día</h1>
            <hr>
            @foreach($products as $product)
                <div class="products_box col-md-4">
                    <a href="/plato/{{ $product->id }}">
                        <div class="image_product">
                            {{--@if(file_exists( public_path().'/images/photos/account/'.Auth::user()->account_id.'.png' )) --}}
                            @if(!empty( Voyager::image( $product->image ) ))
                                <img src="{{ Voyager::image( $product->image ) }}">
                            @else
                                <img src="{{ asset( 'images/no-image.png' ) }}">
                            @endif
                        </div>
                        <div class="content-info">
                            <span class="nameProduct">{{ ucwords($product->name) }}</span>
                            <span class="descProduct"  data-toggle="tooltip" data-placement="top" title="{{ $product->description }}">{{ $product->description }}</span>
                            <span class="priceProduct">$RD {{ $product->price }}</span>
                            <div class="ec-stars-wrapper">
                                <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
                                <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
                                <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
                                <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
                                <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                            </div>
                            <noscript>Necesitas tener habilitado javascript para poder votar</noscript>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <hr>
    {{-- Productos --}}

</div>


<div class="container">
    <div class="row" style="padding: 70px 0px">

    </div>
</div>


<section class="content_module new_row apps show">
    <div class="new_row content_bg">
        <article class="new_center_content">
            <div class="content_info">
                <h2>Descarga iZabor en tu celular</h2>
                <h3>Opción que complace su paladar</h3>
                <ul>
                    <li>
                        <a href="https://itunes.apple.com"
                           target="_blank">
                            <img src="{{ asset('images/mob-button-appstore.png') }}" alt="Disponible en el App Store">
                        </a>
                    </li>
                    <li>
                        <a href="https://play.google.com/store/apps/developer?id=Luis+Armando+Mar%C3%ADn"
                           target="_blank">
                            <img src="{{ asset('images/mob-button-gplay.png') }}" alt="Disponible en Google Play">
                        </a>
                    </li>
                </ul>
            </div>
            <img src="{{ asset('images/mobile-app.png') }}" class="phone_img" alt="Descargar app">
        </article>
        <article class="new_row apps app_mobile">
            <h2>Para una mejor experiencia descargá la app</h2>

            <a href="https://play.google.com/store/apps/developer?id=Luis+Armando+Mar%C3%ADn" class="ghost es android" alt="" title="Disponible en Google Play">Disponible en Google Play</a>
        </article>
    </div>
</section>


<!-- Modal Login -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">{{ __('voyager::login.signin_below') }}</h4>
            </div>
            <div class="modal-body">
                <div class="social-buttons">
                    <a class="btn btn-block btn-social btn-facebook">
                        <span class="fab fa-facebook"></span> Continuar con Facebook
                    </a>
                    <a class="btn btn-block btn-social btn-google">
                        <span class="fab fa-google"></span> Continuar con Google
                    </a>
                </div>
                <div class="line line-top text-center" style="margin: 2em auto;">
                    <small id="smallOr" class="sub">O registrate con tu email</small>
                    <hr class="hr">
                </div>
                <form action="{{ route('register') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-group-default" id="namelGroup">
                        <label>{{ __('voyager::generic.email') }}</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" value=""
                                   placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>{{ __('voyager::generic.password') }}</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}"
                                   class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block login-button" style="margin-right: 20px">
                        <span class="signingin hidden"><span
                                class="voyager-refresh"></span> {{ __('voyager::login.registring') }}...</span>
                        <span class="signin">{{ __('voyager::generic.login') }}</span>
                    </button>

                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
        @if (session()->has('success_message'))
            <div class="alert alert-green">
                <ul class="list-unstyled">
                    <li>{{ session()->get('success_message') }}</li>
                </ul>
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-red">
                <ul class="list-unstyled">
                    <li>{{ session()->get('error_message') }}</li>
                </ul>
            </div>
        @endif
    </div>
</div>
<!-- Modal Login -->


<!-- Modal Register -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Registrate</h4>
            </div>
            <div class="modal-body">
                <div class="social-buttons">
                    <a class="btn btn-block btn-social btn-facebook" >
                        <span class="fab fa-facebook"></span> Continuar con Facebook
                    </a>
                    <a class="btn btn-block btn-social btn-google" >
                        <span class="fab fa-google"></span> Continuar con Google
                    </a>
                </div>
                <div class="line line-top text-center" style="margin: 2em auto;">
                    <small id="smallOr" class="sub">O registrate con tu email</small>
                    <hr class="hr">
                </div>
                <form action="{{ route('register') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-group-default" id="namelGroup">
                        <label>{{ __('voyager::generic.name') }}</label>
                        <div class="controls">
                            <input type="text" name="name" id="name" value=""
                                   placeholder="{{ __('voyager::generic.name') }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group form-group-default" id="emailGroup">
                        <label>{{ __('voyager::generic.email') }}</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" value=""
                                   placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>{{ __('voyager::generic.password') }}</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}"
                                   class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>{{ __('general.password-confirma') }}</label>
                        <div class="controls">
                            <input type="password" name="password_confirmation" id="password-confirm" placeholder="{{ __('general.password-confirm') }}"
                                   class="form-control" required>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-block login-button" style="width:100%">
                        <span class="signingin hidden"><span
                                class="voyager-refresh"></span> {{ __('voyager::login.registring') }}...</span>
                        <span class="signin">{{ __('general.registry') }}</span>
                    </button>

                </form>
            </div>
            <div class="modal-footer"></div>
        </div>

    </div>
</div>
<!-- Modal -->


{{-- Resolucion pantalla --}}
{{--<script language="JavaScript">--}}
    {{--document.writeln(screen.width + " x " + screen.height)--}}
{{--</script>--}}


@include('footer');
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    var email = document.querySelector('[name="email"]');
    var password = document.querySelector('[name="password"]');
    btn.addEventListener('click', function (ev) {
        if (form.checkValidity()) {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
            ev.preventDefault();
        }
    });
    email.focus();
    document.getElementById('emailGroup').classList.add("focused");

    // Focus events for email and password fields
    email.addEventListener('focusin', function (e) {
        document.getElementById('emailGroup').classList.add("focused");
    });
    email.addEventListener('focusout', function (e) {
        document.getElementById('emailGroup').classList.remove("focused");
    });

    password.addEventListener('focusin', function (e) {
        document.getElementById('passwordGroup').classList.add("focused");
    });
    password.addEventListener('focusout', function (e) {
        document.getElementById('passwordGroup').classList.remove("focused");
    });

</script>
</body>
</html>
