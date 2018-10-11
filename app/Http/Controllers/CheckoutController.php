<?php

namespace Order\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Order\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Order\Mail\OrderPlaced;
use Order\OrderProduct;
use Order\Product;
use Order\Order;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Cart::count() > 0){
            return view('checkout');
        }
        else{
            return Redirect::to('/');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = request()->all();
//        echo "<pre>"; print_r($data); echo "</pre>";
//        dd($data);

        try {
            // if(!isset($data['extra'])){
            //     $extra = '0';
            // } else {
            //     $extra = $data['extra'];
            // }

            $order = $this->addToOrdersTables($data, null);

             Mail::send(new OrderPlaced($order));
             Mail::send(new OrderPlaced($order));

            // decrease the quantities of all the products in the cart
            // $this->decreaseQuantities();

            Cart::instance('default')->destroy();

            return redirect()->route('confirmation.index')->with('success_message', '¡Gracias! Su pedido se ha realizado con éxito!');

        } catch (CardErrorException $e) {
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }

             return Redirect::to('cart');
    }

    /**
    *
    * Store Database
    *
    *
    */
    protected function addToOrdersTables($request, $error)
    {
//        echo "<pre>"; print_r($request); echo "</pre>";
//        dd(Cart::total());


        // Insert into orders table
        $subtotal = str_replace(',', '.', Cart::total());
        $ShippingCost = config('cart.ShippingCost');
        $total = $subtotal + $ShippingCost;
        $order = Order::create([
        // $query = DB::table('orders')->insert(array(
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request["email"],
            'billing_name' => $request["name"],
            'billing_address' => $request["address"],
            'billing_phone' => $request["phone"],
            // 'billing_subtotal' => getNumbers()->get('newSubtotal'),
            // 'billing_tax' => getNumbers()->get('newTax'),
            // 'billing_total' => getNumbers()->get('newTotal'),
            'billing_subtotal' => str_replace(',','.', Cart::total()),
            'billing_tax' => str_replace(',','.', Cart::tax() ),
            'billing_total' => str_replace(',','.', $total ),
            'status' => 1,
            'error' => $error,
        // ));
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }


/*
* Decrease Wuantity
*/
    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            dd($product);
            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    /*
    * Producto no disponible
    */
    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
