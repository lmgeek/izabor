{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Login') }}--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--{{ __('Forgot Your Password?') }}--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}


@include('headerFront')
<style>
    body {
        {{--background-image:url('{{ Voyager::image( Voyager::setting("admin.bg_image"), voyager_asset("images/bg.jpg") ) }}');--}}
 background-image: url('{{ asset("images/0W8A1835.jpg") }}');
        background-color: {{ Voyager::setting("admin.bg_color", "#FFFFFF" ) }};
    }

    body.login .login-sidebar {
        border-top: 5px solid{{ config('voyager.primary_color','#22A7F0') }};
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

    .login-button, .bar:before, .bar:after {
        background: {{ config('voyager.primary_color','#22A7F0') }};
    }

    .facebook-login {
        background: url(common/sprite-icon-opt-ef439ee….svg) no-repeat left -2103px #2D5F9A;
        border: 1px solid #2D5F9A;
        border-radius: 2px;
        margin: 0 auto;
        width: 100%;
        height: 40px;
        color: #fff;
        /*padding: .7em 1em .5em 5em;*/
        font-size: 1.2rem;
        cursor: pointer;
    }

    .google-login {
        background: -2103px #dd4b39;
        border: 1px solid #dd4b39;
        border-radius: 2px;
        margin: 0 auto;
        width: 100%;
        height: 40px;
        color: #fff;
        /*padding: .7em 1em .5em 5em;*/
        font-size: 1.2rem;
        cursor: pointer;
    }


</style>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>

<body class="login">
<div class="container-fluid">
    <div class="row">
        <div class="faded-bg animated"></div>
        <div class="hidden-xs col-sm-7 col-md-8">
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
                    <div class="logo-title-container" style="margin: 0 auto!important">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn"
                                 src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                            {{ voyager_asset('images/logo-icon-light.png') }}
                        @else
                            <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn"
                                 src="{{ asset( 'images/logo.png' ) }}" alt="Logo Icon" style="margin-left: 70px;">
                        @endif
                        <div class="copy animated fadeIn">
                            <h1>{{ Voyager::setting('admin.title', 'Voyager') }}</h1>
                            <p>{{ Voyager::setting('admin.description', __('voyager::login.welcome')) }}</p>
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar"
             style="margin-bottom: -90px!important; z-index: 0!important">


            <div class="login-container">
                <div class="col-md-6" style="padding-left: 0!important; padding-right: 0!important">
                    <form action="/">
                        {{--<button class="btn google-login"><i class="fab fa-google"></i> Login con Google</button>--}}

                        <a class="btn btn-block btn-social btn-google" style="color: #ffffff">
                            <span class="fab fa-google"></span> Login con Google
                        </a>
                    </form>
                </div>
                <div class="col-md-6" style="padding-left: 0!important; padding-right: 0!important">
                    <form action="/">
                        {{--<button class="btn facebook-login"><i class="fab fa-facebook-f"></i> Login con facebook</button>--}}
                        <a class="btn btn-block btn-social btn-facebook" style="color: #ffffff">
                            <span class="fab fa-facebook"></span> Login con Facebook
                        </a>
                    </form>
                </div>
                <br>
                <hr>
                <br>
                <p>{{ __('voyager::login.signin_below') }}</p>

                <form action="{{ route('voyager.login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-group-default" id="emailGroup">
                        <label>{{ __('voyager::generic.email') }}</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" value="{{ old('email') }}"
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
                    <button type="button" class="btn btn-block login-button" data-toggle="modal" data-target="#myModal">
                        <span class="signin">{{ __('general.registry') }}</span>
                    </button>
                    <button type="submit" class="btn btn-block login-button" style="margin-right: 20px">
                        <span class="signingin hidden"><span
                                class="voyager-refresh"></span> {{ __('voyager::login.registring') }}...</span>
                        <span class="signin">{{ __('voyager::generic.login') }}</span>
                    </button>


                </form>

                <div style="clear:both"></div>

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


                @if(!$errors->isEmpty())
                    <div class="alert alert-red">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div> <!-- .login-container -->

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->


<!-- Modal -->
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
                        <label>{{ __('general.password-confirm') }}</label>
                        <div class="controls">
                            <input type="password" name="password_confirmation" id="password-confirm"
                                   placeholder="{{ __('general.password-confirm') }}"
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


{{-- SwiftToSaveToLater --}}
{{--@if (Cart::instance('saveForLater')->count() > 0)--}}

{{--<h2>{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h2>--}}
{{--@else--}}

{{--<h3>You have no items Saved for Later.</h3>--}}

{{--@endif--}}

{{-- SwiftToSaveToLater --}}


@include('footer')

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
