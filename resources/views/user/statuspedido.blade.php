<?php
/**
 * Created by PhpStorm.
 * User: luismarin
 * Date: 16/10/2018
 * Time: 11:24
 */
?>
<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@include('headerFront')

{{-- Background Header --}}
<div style="position: relative; overflow: hidden; margin-bottom: 20px">
    <div class="progressive-image_container" style="position: absolute; width: 100%; height: 100%;">
        <img src="{{ asset('images/bg_header.png') }}"
             style="width: 100%; height: 100%; transition: -webkit-filter 1.5s ease 0s;">
    </div>
    <div style="position: relative;">
        <section class="ui container _1aP3Hvrg71IsrTM22x8W6m" style="height:20.5rem!important;"><h1
                    class="ch2Gspxs_6Su97s_BWokH">Checkout - Status de tu compra</h1>
        </section>
    </div>
</div>
{{-- Background Header --}}

{{-- Body --}}


<div class="container" style="margin-bottom: 150px">
    <div class="row">
        <div class="col-lg-12">
            {{--<h3 class="text-center">Zigzag Timeline Layout (and Cats)</h3>--}}
            {{--<p>--}}
                {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.--}}
            {{--</p>--}}
            <ul class="timeline">
                <li>
                    <div class="timeline-image">
                        <img class="img-circle img-responsive" src="{{ asset('images/sold.png') }}" alt="">
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>1</h4>
                            <h4 class="subheading">Pedido realizado</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">
                                Realizaste una compra y instantes será preparáda.
                            </p>
                        </div>
                    </div>
                    <div class="line"></div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <img class="img-circle img-responsive" src="{{ asset('images/cook.png') }}" alt="">
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2</h4>
                            <h4 class="subheading">Preparando pedido</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">
                                Estamos preparando tu pedido, pronto será enviado.
                            </p>
                        </div>
                    </div>
                    <div class="line" @if($status == 1) style="display: none;" @endif></div>
                </li>
                <li>
                    <div class="timeline-image" @if($status == 1) style="opacity: 0.5;" @endif>
                        <img class="img-circle img-responsive" src="{{ asset('images/delivery.png') }}" alt="">
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>3</h4>
                            <h4 class="subheading">Pedido enviado</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">
                                Su pedido ya ha sido enviado, pronto estará en tus manos.
                            </p>
                        </div>
                    </div>
                    <div class="line" @if($status == 1 || $status == 2) style="display: none;" @endif></div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image" @if($status == 1 || $status == 2) style="opacity: 0.5;" @endif>
                        <img class="img-circle img-responsive" src="{{ asset('images/paid.jpg') }}" alt="">
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>4</h4>
                            <h4 class="subheading">Pedido recibido</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">
                                Ya haz recibido tu pedido, no olvides calificar tu compra.
                            </p>
                        </div>
                    </div>
                    {{--<div class="line"></div>--}}
                </li>
                {{--<li>--}}
                    {{--<div class="timeline-image">--}}
                        {{--<img class="img-circle img-responsive" src="{{ asset('images/paid.png') }}" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="timeline-panel">--}}
                        {{--<div class="timeline-heading">--}}
                            {{--<h4>Bonus Step</h4>--}}
                            {{--<h4 class="subheading">Subtitle</h4>--}}
                        {{--</div>--}}
                        {{--<div class="timeline-body">--}}
                            {{--<p class="text-muted">--}}
                                {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
</div>


{{-- Body --}}

@include('footer')