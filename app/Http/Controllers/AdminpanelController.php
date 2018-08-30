<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminpanelController extends Controller
{
    protected $orders;
    public function __construct(Orders $orders)
    {
        //$this->middleware('auth');
        $this->orders = $orders;
    }

    public function index()
    {
            return view('admin.dashboard');
    }

    public function myorder()
    {
        $order = $this->orders
            ->with('guests')
            ->with('places')
            ->get();

        $orders = $order->where('users_id',Auth::user()->id);
        return view('admin.orders.myorders',compact('orders'));
    }

    public function allorders()
    {
        $orders = $this->orders
            ->with('guests')
            ->with('places')
            ->get();

        return view('admin.orders.allorders',compact('orders'));
    }
}
