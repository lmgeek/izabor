<?php

namespace Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Order\Order;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {
//        if (! session()->has('success_message')) {
//            return redirect('/');
//        }

//        echo "<pre>"; print_r($request); echo "</pre>";
//        dd($request);
        return view('thankyou', ['order' => $request]);
    }

    /**
     * Display Status Delivery
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {

        $user = Auth::User();
        $status = Order::find($request->order);
        if (!$user) {
            return redirect('admin/login');
        } else {
            if ($user->id == $status->user_id){

                return view('user.statuspedido', ['status' => $status->status]);

            } else {

                return redirect('profile');

            }
        }

    }
}
