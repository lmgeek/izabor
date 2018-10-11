<?php
/**
 * Created by PhpStorm.
 * User: lamnav
 * Date: 9/9/2018
 * Time: 00:59
 */

$total = 0;
$subtotal = 0;
?>


@include('headerFront')
<style>
    body {
        height: 100%;
    }

    .input-group {
        width: 130px;
        margin: 0 auto;
    }

    .fa-plus, .fa-minus {
        color: #f52f41;
    }

    .total {
        width: 100px;
        border: none;
        background: transparent;
    }

    .no-articles {
        margin: 150px auto;
    }

    .cart-options {
        color: #212121;
        background: transparent;
        font-size: 14px!important;
        padding: 0;
    }
    form button[type="submit"] {
        border-style: none;
        cursor: pointer;
        font-size: 18px;
        line-height: 1.6;
    }
</style>
<div style="position: relative; overflow: hidden; margin-bottom: 20px">
    <div class="progressive-image_container" style="position: absolute; width: 100%; height: 100%;">
        <img src="{{ asset('images/bg_header.png') }}"
             style="width: 100%; height: 100%; transition: -webkit-filter 1.5s ease 0s;">
    </div>
    <div style="position: relative;">
        <section class="ui container _1aP3Hvrg71IsrTM22x8W6m" style="height:20.5rem!important;"><h1
                class="ch2Gspxs_6Su97s_BWokH">Carrito</h1>
        </section>
    </div>
</div>

<div class="cart-section container">
    <div>
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<?php //dd(); ?>
        @if (Cart::count() > 0)

            <h4>{{ Cart::count() }} item(s) en el carrito</h4>

            <table class='table table-hover table-responsive'>
                <thead>
                <tr>
                    <th class='thead' width="15%"></th>
                    <th class='textAlignLeft thead'>Nombre del producto</th>
                    <th class="thead">Precio</th>
                    <th class="thead text-center">Cantidad</th>
                    <th class="thead">Sub Total</th>
                    <th class="thead"></th>
                </tr>
                </thead>
                <tbody>


                @foreach (Cart::content() as $item)

                    <tr>
                        <td class="text-center">
                            {{-- <img src="{{ asset('images/no-image.png') }}" alt="" width="100px" class="text-center"> --}}
                            {{-- @if(file_exists( Voyager::image( $item->image ) ))
                                <img src="{{ Voyager::image( $item->image ) }}" alt="" width="100px" class="text-center">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="" width="100px" class="text-center">
                            @endif --}}
                            @if(!empty( Voyager::image( $item->model->image ) ))
                                <img src="{{ Voyager::image( $item->model->image ) }}" style="width:70%">
                            @else
                                <img src="{{ asset( 'images/no-image.png' ) }}" style="width:70%">
                            @endif
                        </td>
                        <td>
                            <div class='product-id' style='display:none;'>7</div>
                            <div class='product-name'>{{ ucwords($item->model->name) }}</div>
                            <div style="font-size: 11px">{{ ucwords($item->model->description) }}</div>

                        </td>
                        <td class="precio">&#36;{{ $item->model->price }}

                        <td>
                            <div class='input-group'>
                                <input type="hidden" class="price" value="{{ $item->model->price }}" id="price"
                                       name="price">
                                <div class="input-group text-center">
                                    {{ $item->qty }}
                                    {{--<span class="input-group-btn">--}}
                                        {{--<button type="button" class="btn btn-default btn-number" data-type="minus"--}}
                                                {{--data-field="quantity[1]" style="margin-top: 0px; padding: 5px 10px;">--}}
                                            {{--<span class="fas fa-minus"></span>--}}
                                        {{--</button>--}}
                                    {{--</span>--}}
                                    {{--<input type="text" name="quantity[1]" id="quantity"--}}
                                           {{--class="form-control input-number text-center" value="{{ $item->qty }}"--}}
                                           {{--min="1" max="10">--}}
                                    {{--<span class="input-group-btn">--}}
                                        {{--<button type="button" class="btn btn-default btn-number" data-type="plus"--}}
                                                {{--data-field="quantity[1]" style="margin-top: 0px; padding: 5px 10px;">--}}
                                            {{--<span class="fas fa-plus"></span>--}}
                                        {{--</button>--}}
                                    {{--</span>--}}
                                </div>
                            </div>
                        </td>
                        <td>&#36; <input type="text" id="subtotal" data-type="subtotal" readonly="" class="total"
                                         value="{{ $item->model->price * $item->qty }}"></td>
                        <td>
                            {{--  @include('cart.delete') --}}
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options">Remover</button>
                            </form>
                            {{--<form action="/" method="POST">--}}
                                {{--{{ csrf_field() }}--}}

                                {{--<button type="submit" class="cart-options">Guardar</button>--}}
                            {{--</form>--}}
                        </td>
                    </tr>

                @endforeach
                <tr class="total">
                    <td colspan="3"></td>
                    <td>
                        <b>Subtotal</b><br>
                        <b>Tax (13%)</b><br>
                        <b>Costo envío</b><br>
                        <b>Total</b>
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
                        <input type="hidden" readonly="" class="total" value="{{ config('cart.ShippingCost') }}" id="envio"><br>
                    </td>
                    <td></td>
                </tr>
                </tbody>
            </table>
    </div> <!-- end cart-table -->

    <div style="float: right; margin-bottom: 100px;">
        <div class="spacer"></div>
        <a href="/" class="btn btn-primary" style="margin-right: 20px"><i class="fas fa-shopping-basket"></i> Seguir
            comprando</a>

        <a href="{{ route('checkout.index') }}" class="btn btn-primary" style="margin-right: 20px"><i class="fas fa-shopping-cart"
                                                                          style="font-size: 1em"></i> Procesar compra</a>
        <div class="spacer"></div>
    </div>

    @else

        <div class="no-articles text-center">
            <h4>No hay artículos cargados en el Carrito</h4>
            <div class="spacer"></div>
            <a href="/" class="btn btn-primary" style="margin-right: 20px"><i class="fas fa-shopping-basket"></i> Seguir
                comprando</a>
            <div class="spacer"></div>
        </div>

    @endif


</div>
</div>

@include('footer')

<script>
    $(document).ready(function () {
        $('.btn-number').click(function (e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            m1 = document.getElementById("price").value;
            envio = document.getElementById("envio").value;

            if (type == "minus") {
                var inputminus = $(this).parent().next();
                var subtotal = $(this).parent().parent().parent().next();
                if (parseInt(inputminus.val()) != 0) {
                    inputminus.val(parseInt(inputminus.val()) - 1);
                    console.log(subtotal);

                    subtotal = parseFloat(subtotal) * parseInt(input.val());
                    document.getElementById("subtotal").value = subtotal;

                    total = parseFloat(subtotal) + parseFloat(envio);
                    document.getElementById("total").value = total;
                }
            }
            else {
                var input = $(this).parent().prev();
                var inputQty = parseInt(input.val());
                input.val(inputQty + 1);

                subtotal = parseFloat(m1) * parseInt(input.val());
                document.getElementById("subtotal").value = subtotal;

                total = parseFloat(subtotal) + parseFloat(envio);
                document.getElementById("total").value = total;

            }

            // console.log($(this).parent().prev().val());


            // if (!isNaN(currentVal)) {
            //   if (type == 'minus') {

            //     if (currentVal > input.attr('min')) {
            //       input.val(currentVal - 1).change();
            //     }
            //     if (parseInt(input.val()) == input.attr('min')) {
            //       $(this).attr('disabled', true);
            //     }

            //   } else if (type == 'plus') {

            //     if (currentVal < input.attr('max')) {
            //       input.val(currentVal + 1).change();
            //     }
            //     if (parseInt(input.val()) == input.attr('max')) {
            //       $(this).attr('disabled', true);
            //     }

            //   }
            // } else {
            //   input.val(0);
            // }
        });
        $('.input-number').focusin(function () {
            $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function () {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());


            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });


    });
</script>
