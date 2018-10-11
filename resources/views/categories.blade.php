<?php
/**
 * Created by PhpStorm.
 * User: lamnav
 * Date: 11/9/2018
 * Time: 00:53
 */

$id = request()->segment(count(request()->segments()));
$categories = App\Category::where('id', '=', $id)->firstOrFail();
$categoriess = App\Category::all();
?>


@include('headerFront')

<div style="position: relative; overflow: hidden; margin-bottom: 20px">
    <div class="progressive-image_container" style="position: absolute; width: 100%; height: 100%;">
        <img src="{{ asset('images/bg_header.png') }}"
             style="width: 100%; height: 100%; transition: -webkit-filter 1.5s ease 0s;">
    </div>
    <div style="position: relative;">
        <section class="ui container _1aP3Hvrg71IsrTM22x8W6m" style="height:20.5rem!important;">
            <h1 class="ch2Gspxs_6Su97s_BWokH">{{ ucwords($categories->name) }}</h1>
        </section>
    </div>
</div>

<div class="container">
    <div class="row">
        <div>
           <div style="float: left;">
               @foreach($category as $categoryes)
                   <div class="products_box" style="margin-bottom: 20px; width: 40%;">
                       <a href="/plato/{{ $categoryes->id }}">
                           <div class="image_product">
                               <img src="{{ Voyager::image( $categoryes->image ) }}" style="float: left; margin-top: 0px; width: 100%; height: 100%">
                           </div>
                           <div class="content-info">
                               <span class="nameProduct">{{ ucwords($categoryes->name) }}</span>
                               <span class="descProduct">{{ $categoryes->description }}</span>
                               <span class="priceProduct">$RD {{ $categoryes->price }}</span>
                               <div class="ec-stars-wrapper">
                                   <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
                                   <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
                                   <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
                                   <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
                                   <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                               </div>
                               <noscript>Necesitas tener habilitado javascript para poder votar</noscript>
                           </div>
                       </a>
                   </div>
               @endforeach


           </div>
        </div>
    </div>
</div>


@include('footer')
