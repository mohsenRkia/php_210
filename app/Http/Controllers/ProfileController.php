<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    protected $orders;
    public function __construct(Orders $orders)
    {
        $this->middleware('auth');
        $this->orders = $orders;
    }
    public function index()
    {
        return view('profile.profile');
    }

    public function orders()
    {
        $order = $this->orders
            ->with('guests')
            ->with('places')
            ->get();


        //$orders = $order->where('users_id',Auth::user()->id)->toArray();
        //var_dump($orders[1]);

        $orders = $order->where('users_id',Auth::user()->id);
        return view('profile.orders.myorders',compact('orders'));
    }
}
