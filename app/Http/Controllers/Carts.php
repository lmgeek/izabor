<?php

namespace Order\Http\Controllers;

//use Order\Http\Controllers\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Order\Product;
use Exception;
// use Order\Cart;
use DB;

class Carts extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('cart');
    }


    /**
     * Remove the specified resource from destroy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item ha sido removido!');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Order\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
             return Redirect::to('cart')->with('success_message', '¡El artículo ya está en su carrito!');
        }

        Cart::add($request->id, $request->name, $request->qty, $request->price)
            ->associate('Order\Product');

         return Redirect::to('cart')->with('success_message', '¡El artículo fue agregado a su carrito!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $validator = Validator::make($request->all(), [
//            'quantity' => 'required|numeric|between:1,5'
//        ]);
//
//        if ($validator->fails()) {
//            session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
//            return response()->json(['success' => false], 500);
//        }
//
//        if ($request->quantity > $request->productQuantity) {
//            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
//            return response()->json(['success' => false], 400);
//        }
//
        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Ha actualizado la cantidad del plato');
        return response()->json(['success' => true]);

//        return $request->all();
    }


    /**
     * Switch item for shopping cart to Save for Later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Plato ya ha sido guardado anteriormente!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('Order\Product');

        return redirect()->route('cart.index')->with('success_message', 'Plato se ha guardado para su futura compra!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cart');
    }


    /**
     * Show the search products.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
//        $products = App\product::all();
        return view('search');
    }








    // public function destroy($id) {
    //     Cart::find($id)->delete();
    //     return Redirect::to('cart')->with('success','Registro eliminado satisfactoriamente');
    // }

    // public function index()
    // {
    //     $cart = Cart::join('products','carts.product_id','=','products.id')
    //         ->select('carts.id','carts.product_id','products.name','products.description','products.image','carts.quantity','carts.price')
    //         ->get();
    //     dd($cart);
    //     return view('cart', compact('cart'));
    //     return view('cart');
    // }

    // public function store(Request $request)
    // {
    //    $data = request()->all();

    //    if(!isset($data['extra'])){
    //        $extra = '0';
    //    } else {
    //        $extra = $data['extra'];
    //    }

    //     $query = DB::table('carts')->insert(array(
    //         'product_id'     => $data['product_id'],
    //         'quantity'       => $data['quantity'],
    //         'extra'          => $extra,
    //         'nota_adicional' => $data['adicional'],
    //         'price'          => $data['price'],
    //         'user_id'        => $data['user_id']
    //     ));

    //     return Redirect::to('cart');

    // }

    


}
