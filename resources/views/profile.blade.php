<?php
/**
 * Created by PhpStorm.
 * User: lamnav
 * Date: 1/10/2018
 * Time: 04:25
 */
?>

@include('headerFront')
    <style>
        .user-email {
            font-size: .85rem;
            margin-bottom: 1.5em;
        }
    </style>



    <div style="background-size:cover; background-image: url({{ Voyager::image( Voyager::setting('admin.bg_image'), config('voyager.assets_path') . '/images/bg.jpg') }}); background-position: center center;position:absolute; top:0; left:0; width:100%; height:300px;"></div>
    <div style="height:160px; display:block; width:100%"></div>
    <div style="position:relative; z-index:9; text-align:center;">
        <img src="@if( !filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)){{ Voyager::image( Auth::user()->avatar ) }}@else{{ Auth::user()->avatar }}@endif"
             class="avatar"
             style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
             alt="{{ Auth::user()->name }} avatar">
        <h4>{{ ucwords(Auth::user()->name) }}</h4>
        <div class="user-email text-muted">{{ ucwords(Auth::user()->email) }}</div>
        <p>{{ Auth::user()->bio }}</p>
        <a href="#" class="btn btn-primary">{{ __('voyager::profile.edit') }}</a>
{{--        <a href="{{ route('voyager.users.edit', Auth::user()->id) }}" class="btn btn-primary">{{ __('voyager::profile.edit') }}</a>--}}
    </div>

<div class="container">
    <div class="text-center row">
        <h1 class="text-center">Pedidos recientes</h1>
        <h4 class="text-center">Todavía no  haz realizado pedidos</h4>
        <button class="btn btn-danger" type="button" onclick="window.location='{{ route("index") }}'">Empezar ahora</button>

    </div>
</div>

