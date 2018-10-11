<?php
/**
 * Created by PhpStorm.
 * User: lamnav
 * Date: 9/9/2018
 * Time: 00:59
 */

if ( $product->extra_id == null ){
//    $extras = App\Extras::all();
} else {
    $extras = App\Extras::where('id', '=', $product->extra_id)->firstOrFail();
}
$categories = App\Category::all();
?>


@include('headerFront')

<div style="position: relative; overflow: hidden; margin-bottom: 20px">
    <div class="progressive-image_container" style="position: absolute; width: 100%; height: 100%;">
        <img src="{{ asset('images/bg_header.png') }}"
             style="width: 100%; height: 100%; transition: -webkit-filter 1.5s ease 0s;">
    </div>
    <div style="position: relative;">
        <section class="ui container _1aP3Hvrg71IsrTM22x8W6m" style="height:20.5rem!important;"><h1
                class="ch2Gspxs_6Su97s_BWokH">{{ ucwords($product->name) }}</h1>
        </section>
    </div>
</div>

{{--<div style="position: relative; height: 100%; overflow: hidden; margin-bottom: 20px">--}}
    {{--<div class="progressive-image_container" style="position: absolute; width: 100%; height: 100%;">--}}
        {{--<img src="{{ asset('images/bg_header.png') }}" style="width: 100%; transition: -webkit-filter 1.5s ease 0s;">--}}
    {{--</div>--}}
    {{--<div style="position: relative;">--}}
        {{--<section class="ui container _1aP3Hvrg71IsrTM22x8W6m"><h1 class="ch2Gspxs_6Su97s_BWokH">Restaurantes en</h1>--}}
            {{--<div class="_2mjG9KritHbH0hijU8Tin9"><h2 class="_2JZfDbhCXIPbybS3iVK5Dm">Calle 23 #&nbsp;4 - 1</h2></div>--}}
            {{--<div class="ui segment dimmable">--}}
                {{--<button class="ui primary button _337ZkQgiiixgszS5ZIoi4i" role="button">Cambiar dirección</button>--}}
            {{--</div>--}}
        {{--</section>--}}
    {{--</div>--}}
{{--</div>--}}

{{--<div style="position: relative; overflow: hidden; margin-bottom: 20px">--}}
    {{--<div class="progressive-image_container" style="position: absolute; width: 100%; height: 100%;">--}}
        {{--<img src="{{ asset('images/bg_header.png') }}"--}}
             {{--style="width: 100%; height: 100%; transition: -webkit-filter 1.5s ease 0s;">--}}
    {{--</div>--}}
    {{--<div style="position: relative;">--}}
        {{--<section class="ui container _1aP3Hvrg71IsrTM22x8W6m" style="height:20.5rem!important;"><h1--}}
                {{--class="ch2Gspxs_6Su97s_BWokH">Carrito</h1>--}}
        {{--</section>--}}
    {{--</div>--}}
{{--</div>--}}


<div class="container">
    <div class="row">
        <div class="col-md-3 categories" >
            <h4>Categorias</h4>
            <ul>
                @foreach($categories as $category)
                    <li>
                        <a href="/category/{{ $category->id }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6 product">
            {{--<form action="{{ url('cart/addCart') }}" method="POST">--}}
            {!! Form::open(['route' => 'cart.store']) !!}
            {!! csrf_field() !!}
                <img src="{{ Voyager::image( $product->image ) }}" style="width:100%">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="user_id" value="1">
                <div class="info">
                    <h3>{{  ucwords($product->name) }}</h3>
                    <p class="description">{!! $product->description !!}</p>
                </div>
                <div class="price">
                    <h3>$ {{ $product->price }}</h3>
                </div>
                <hr>
                <h4>Extras</h4>
                <ul>
                @if( !empty($extras) )

{{--                    @foreach( $extras as $extra)--}}
                        <li>
                            <input type="checkbox" name="extras" value="{{ $extras->id }}"> <label for="">{{ $extras->name }}</label>
                            ( <small>+ ${{ $extras->price }}</small> )
                        </li>
                    {{--@endforeach--}}
                @else
                    <li>
                        No contiene extras
                    </li>
                @endif
                </ul>
                <h4>Aclaraciones Adicionales</h4>
                <div class="form-group">
                    <textarea class="form-control rounded-0" name="adicional" id="adicionales" rows="2"></textarea>
                </div>
                <hr>
                <div style="float: right;">
                    <label for="">Cantidad</label>
                    <input type="number" class="form-control" name="quantity" min="1" value="1" style="max-width: 20%;display: ruby;">
                    <button class="btn btn-danger">Agregar a mi pedido</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>


@include('footer')
