<?php
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/**
* Home & Web
*/

Route::get('/', function () {
    // $posts = App\Post::all();
     $products = Order\products::all();
     return view('welcome', compact('posts','products'));
//    return view('welcome');
})->name('index');
Route::get('/contacto', function(){
    return view('contacto');
});




/**
* Auth
*/
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');




/**
* Registro usuario
*/
Route::get('/register', [
    'as' => 'register', 'uses' => 'Auth\RegisterController@create'
]);
Route::post('/register', [
    'as' => 'register', 'uses' => 'Auth\RegisterController@create'
]);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});




/**
* post
*/
Route::get('post/{slug}', function($slug){
    $post = Order\Post::where('slug', '=', $slug)->firstOrFail();
    return view('post', compact('post'));
});




/**
* Products
*/
Route::get('/plato/{id}', function($id){
    $product = Order\products::where('id', '=', $id)->firstOrFail();
    return view('products', compact('product'));
});




/**
* Categories
*/
Route::get('/category/{id}', function($id){
//    SELECT * FROM products as p INNER JOIN categories as c WHERE c.id = 1
    $category = DB::select( DB::raw('SELECT * FROM products WHERE category_id = '.$id) );
//    $category = Order\products::where('category_id', '=', $id)->firstOrFail();
    return view('categories', compact('category'));
});




/**
* Route Cart
*/
//Route::get('/cart', 'Carts@index')->name('cart.index');
//Route::patch('/cart/{product}', 'Carts@update')->name('cart.update');
//Route::post('/cart/{product}', 'Carts@store')->name('cart.store');
//Route::patch('/cart/{product}', 'Carts@update')->name('cart.update');
//Route::delete('/cart/{product}', 'Carts@destroy')->name('cart.destroy');

Route::resource('/cart','Carts');
Route::get('/empty',function(){
    Cart::destroy();
});
Route::resource('/delete', 'Carts');

Route::post('/process', function () {
    return view('cart');
});
Route::get('/sales', function () {
    return view('sales');
});


/*
 * Checkout
 */
Route::get('/checkout','CheckoutController@index')->name('checkout.index');
Route::post('/checkout-order','CheckoutController@store')->name('checkout.store');
Route::get('/thankyou/{order}', 'ConfirmationController@index')->name('confirmation.index');
Route::get('/status','ConfirmationController@status')->name('status.status');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');

/**
 * email
 */
Route::get('/emailtest', function (){
    return view('email');
})->name('emailtest');