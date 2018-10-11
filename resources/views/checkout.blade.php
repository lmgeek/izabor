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
<div class="container">

    @if (session()->has('success_message'))
        <div class="spacer"></div>
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="spacer"></div>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="">
        <div class="container" style="margin-bottom: 50px">
            <div class="row">
                <div class="col-md-6">

                    @if (Auth::guest())
                        <h2 class="text-center">Ya soy cliente</h2>
                        <hr>
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
                        <form action="{{ route('login') }}" method="POST">
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
                            <button type="submit" class="btn btn-block login-button" style="margin-right: 20px; float: left; width: 48%; color: #ffffff">
                                <span class="signingin hidden">
                                    <span class="voyager-refresh"></span> {{ __('voyager::login.registring') }}...</span>
                                <span class="signin">{{ __('voyager::generic.login') }}</span>
                            </button>
                            <button type="button" class="btn btn-block login-button" data-toggle="modal" data-target="#myModal" style="float: left; width: 48%; color: #ffffff">
                                <span class="signin">{{ __('general.registry') }}</span>
                            </button>
                        </form>

                        @if (session()->has('success_message'))
                            <div class="alert alert-green">
                                <ul class="list-unstyled">
                                    <li>{{ session()->get('success_message') }}</li>
                                </ul>
                            </div>
                        @endif
                    @else
                        <h2>Detalles de envío</h2>
                        <form action="{{ route('checkout.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}"
                                       placeholder="Introduce tu email">
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre y Apellido</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}"
                                       placeholder="Introduce tu nombre">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" maxlength="11" data-mask="(000) 0000-0000" name="phone" id="telefono" value="{{ auth()->user()->phone }}"
                                       placeholder="Introduce tu teléfono" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Dirección de entrega</label>
                                <textarea type="text" class="form-control" name="address" id="address"
                                          placeholder="Introduce tu dirección" required></textarea>
                            </div>
                            <div style="float: right;">
                                <a href="/" class="btn btn-primary" style="margin-right: 20px">
                                    <i class="fas fa-shopping-basket"></i> Seguir comprando
                                </a>
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-shopping-cart" style="font-size: 1em"></i> Completar pedido
                                </button>
                            </div>
                        </form>

                    @endif

                </div>
                <div class="col-md-6">
                    <h2 class="text-center">Resumen del pedido</h2>
                    <hr>
                    <table class='table table-hover table-responsive'>
                        <thead>
                        <tr>
                            <th class='thead' width="15%"></th>
                            <th class='textAlignLeft thead'></th>
                            <th class="thead" style="float: right">Cantidad</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach (Cart::content() as $item)

                            <tr>
                                <td class="text-center">

                                    @if(!empty( Voyager::image( $item->model->image ) ))
                                        <img src="{{ Voyager::image( $item->model->image ) }}" >
                                    @else
                                        <img src="{{ asset( 'images/no-image.png' ) }}" >
                                    @endif

                                </td>
                                <td>
                                    <strong>{{ $item->model->name }}</strong>
                                    <br>
                                    <p class="description">{{ ucwords($item->model->description) }}</p>
                                    <p>&#36;{{ $item->model->price }}</p>
                                </td>
                                <td >
                                    <div class='input-group' style="float: right">

                                        <input type="text" name="quantity[1]" id="quantity"
                                               class="form-control input-number text-center"
                                               value="{{ $item->qty }}" min="1"
                                               max="10" style="width: 50px">
                                    </div>
                                </td>
                            </tr>


                        @endforeach

                        <tr class="total" style="text-align: right;">
                            <td></td>
                            <td>
                                <b>Subtotal:</b><br>
                                <b>Tax (13%):</b><br>
                                <b>Costo envío:</b><br>
                                <b>Total:</b>
                            </td>
                            <td>
                                <?php
                                $subtotal = str_replace(',', '.', Cart::total());
                                $ShippingCost = config('cart.ShippingCost');
                                $total = $subtotal + $ShippingCost;
                                ?>
                                &#36;{{ Cart::subtotal() }}<br>
                                &#36;{{ Cart::tax() }}<br>
                                &#36;{{ $ShippingCost }}<br>
                                &#36;{{ str_replace('.', ',', $total) }}
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Body --}}


@include('footer')
