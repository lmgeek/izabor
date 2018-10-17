<?php
/**
 * Created by PhpStorm.
 * User: lamnav
 * Date: 25/9/2018
 * Time: 17:10
 */
?>
@include('headerFront')

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
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Detalles de envío</h2>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu email">
                        </div>
                        <div class="form-group">
                            <label for="name">Nombre y Apellido</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Introduce tu email">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" name="phone" id="telefono" placeholder="Introduce tu teléfono">
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección de entrega</label>
                            <textarea type="text" class="form-control" name="address" id="address" placeholder="Introduce tu dirección"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="ejemplo_password_1">Contraseña</label>
                            <input type="password" class="form-control" id="ejemplo_password_1" placeholder="Contraseña">
                        </div>
                        
                </div>
                <div class="col-md-8">
                    <h2 class="text-center">Resumen del pedido</h2>
                    <table class='table table-hover table-responsive'>
                        <thead>
                        <tr>
                            <th class='thead' width="15%"></th>
                            <th class='textAlignLeft thead'>Nombre del producto</th>
                            <th class="thead">Precio</th>
                            <th class="thead text-center">Cantidad</th>
                            <th class="thead">Sub Total</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="text-center">

                                        <img src="{{ asset('images/no-image.png') }}" alt="" width="100px" class="text-center">

                                </td>
                                <td>

                                </td>
                                <td class="precio">&#36;

                                <td>
                                    <div class='input-group'>
                                        <input type="hidden" class="price" value="" id="price" name="price">
                                        <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-number"  data-type="minus" data-field="quantity[1]" style="margin-top: 0px; padding: 5px 10px;">
                                            <span class="fas fa-minus"></span>
                                        </button>
                                    </span>
                                            <input type="text" name="quantity[1]" id="quantity" class="form-control input-number text-center" value="1" min="1" max="10" >
                                            <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quantity[1]" style="margin-top: 0px; padding: 5px 10px;">
                                            <span class="fas fa-plus"></span>
                                        </button>
                                    </span>
                                        </div>
                                    </div>
                                </td>
                                <td>&#36; <input type="text" id="subtotal" data-type="subtotal" readonly="" class="total" value=""></td>

                            </tr>
                        <tr class="total">
                            <td colspan="3"></td>
                            <td><b>Costo envío</b></td>
                            <td> &#36;<input type="text" readonly="" class="total" value="17.00" id="envio"></td>
                            <td></td>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>
                            <td><b>Total</b></td>
                            <td>&#36;<input type="text" readonly="" id="total" name="total" class="total"></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div  style="float: right;">
                <a href="/" class="btn btn-primary" style="margin-right: 20px">Seguir comprando</a>
                <a href="#" type="submit" class="btn btn-danger" style="margin-right: 20px">Completar pedido</a>
                {{--<button type="submit" class="btn btn-danger">Completar pedido</button>--}}
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Body --}}



@include('footer')
