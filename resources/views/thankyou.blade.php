<?php
/**
 * Created by PhpStorm.
 * User: lamnav
 * Date: 25/9/2018
 * Time: 17:10
 */
?>
@include('headerFront')

<style>
    .description {
        font-size: 12px;
        text-align: justify;
    }
    .thank-you-section {
        margin: 120px auto;
    }
</style>

{{-- Background Header --}}
<div style="position: relative; overflow: hidden; margin-bottom: 20px">
    <div class="progressive-image_container" style="position: absolute; width: 100%; height: 100%;">
        <img src="{{ asset('images/bg_header.png') }}"
             style="width: 100%; height: 100%; transition: -webkit-filter 1.5s ease 0s;">
    </div>
    <div style="position: relative;">
        <section class="ui container _1aP3Hvrg71IsrTM22x8W6m" style="height:20.5rem!important;"><h1
                class="ch2Gspxs_6Su97s_BWokH">Checkout - Detalles de compra</h1>
        </section>
    </div>
</div>
{{-- Background Header --}}


{{-- Body --}}
<div class="thank-you-section text-center">
   <h1>Gracias por <br> Tu Orden!</h1>
   <p>Un mensaje con los datos de tu compra ha sido enviado</p>
   <div class="spacer"></div>
   <div>
       <a href="{{ url('/') }}" class="btn btn-danger"><i class="fas fa-home"></i> Inicio</a>&nbsp;
       <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fas fa-motorcycle"></i> Status Pedido</a>
   </div>
</div>

{{-- Body --}}


@include('footer')