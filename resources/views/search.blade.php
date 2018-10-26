<?php
/**
 * Created by PhpStorm.
 * User: luismarin
 * Date: 25/10/2018
 * Time: 10:25
 */
?>
@section('title','Resultados de la busqueda')

@include('headerFront')

<div style="position: relative; overflow: hidden; margin-bottom: 20px">
    <div class="progressive-image_container" style="position: absolute; width: 100%; height: 100%;">
        <img src="{{ asset('images/bg_header.png') }}"
             style="width: 100%; height: 100%; transition: -webkit-filter 1.5s ease 0s;">
    </div>
    <div style="position: relative;">
        <section class="ui container _1aP3Hvrg71IsrTM22x8W6m" style="height:20.5rem!important;"><h1
                    class="ch2Gspxs_6Su97s_BWokH">Resultados de la busqueda</h1>
        </section>
    </div>
</div>


<div class="container">
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
</div>

<div class="container">

<div class="search-container container">
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
    <div class="col-md-9 ">
        <h4>Se encontró {{ $products->count() }} resultado(s) de {{ request()->input('plato') }}</h4>
        {{--<div class="products-header" style="float: right;">--}}
            {{--<h1 class="stylish-heading"></h1>--}}
            {{--<div>--}}
                {{--<strong>Precio: </strong>--}}
                {{--<a href="{{ route('search', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |--}}
                {{--<a href="{{ route('search', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>--}}

            {{--</div>--}}
        {{--</div>--}}

        @if ($products->count() > 0)
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>

                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td width="15%">
                                    <a href="{{ route('plato.show', $product->id) }}">
                                        {{--@if(file_exists( public_path().'/images/photos/account/'.Auth::user()->account_id.'.png' )) --}}
                                        @if(!empty( Voyager::image( $product->image ) ))
                                            <img src="{{ Voyager::image( $product->image ) }}">
                                        @else
                                            <img src="{{ asset( 'images/no-image.png' ) }}">
                                        @endif
                                    </a>
                                </td>
                                <th><a href="{{ route('plato.show', $product->id) }}">{{ $product->name }}</a></th>
                                <td>{{ str_limit($product->description, 80) }}</td>
                                <td>$RD {{ $product->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            {{--<table class="table table-bordered table-striped">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>Name</th>--}}
                    {{--<th>Details</th>--}}
                    {{--<th>Description</th>--}}
                    {{--<th>Price</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--@foreach ($products as $product)--}}
                    {{--<tr>--}}
                        {{--<th><a href="{{ route('plato.show', $product->id) }}">{{ $product->name }}</a></th>--}}
                        {{--<td>{{ $product->details }}</td>--}}
                        {{--<td>{{ str_limit($product->description, 80) }}</td>--}}
                        {{--<td>{{ $product->presentPrice() }}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}


        @endif
    </div>
    <div class="spacer"></div>
    {{ $products->appends(request()->input())->links() }}
</div>
</div>

@include('footer')
