<?php
/**
 * Created by PhpStorm.
 * User: lamnav
 * Date: 1/10/2018
 * Time: 04:25
 */

$i = 0;
use Order\OrderProduct;
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
            @if(count($orders) > 0)
                @foreach($orders as $order)

                    <?php
    //                select * from order_product as op INNER JOIN products as p WHERE op.order_id = 1 AND op.product_id = p.id
                    $products = DB::table('order_product')
                        ->join('products', 'order_product.product_id','=','products.id')
                        ->where('order_product.order_id','=', $order->id)
    //                    ->where('order')
                        ->get();
    //                dd($products);
                    ?>

                    <h4>Pedido Nro: {{ $order->id }} fecha: {{$order->created_at }}</h4>
                    <div class="col-md-12">

                        <hr>
                        <table class='table table-hover table-responsive'>
                            <thead>
                            <tr>
                                <th class='thead' width="15%"></th>
                                <th class='textAlignLeft thead'></th>
                                <th class='text-center thead' >Cantidad</th>
                                <th class="text-center thead" >Pagado</th>
                                <th class="text-center thead" >Acción</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <?php $i = $i++ ?>
                                <tr>
                                    <td class="text-center">

                                        @if(!empty( Voyager::image( $product->image ) ))
                                            <img src="{{ Voyager::image( $product->image ) }}" width="40%">
                                        @else
                                            <img src="{{ asset( 'images/no-image.png' ) }}" width="40%">
                                        @endif

                                    </td>
                                    <td>
                                        <strong>{{ ucwords($product->name) }}</strong>
                                        <br>
                                        <p class="description">{{ ucwords($product->description) }}</p>
    {{--                                    <p>&#36;{{ $order->model->price }}</p>--}}
                                    </td>
                                    <td>
                                        {{ $product->quantity }}

                                    </td>
                                    <td >
                                        {{ $order->billing_total }}
                                    </td>
                            @endforeach
                                    <td rowspan="{{ $i }}">
                                        <a href="{{ route('status.status', ['order' => $order]) }}"><i class="fas fa-hourglass-start"></i> Ver status</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <hr>
    {{--                    {{ $order->id }}--}}
                    </div>

    <?php //dd($order);?>
                @endforeach
            </div>
        </div>
            @else
                <h4 class="text-center">Todavía no  haz realizado pedidos</h4>
                <button class="btn btn-danger" type="button" onclick="window.location='{{ route("index") }}'">Empezar ahora</button>

            </div>
        </div>
        @endif
