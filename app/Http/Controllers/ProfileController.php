<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    protected $orders;
    protected $user;
    public function __construct(Orders $orders,User $user)
    {
        $this->middleware('auth');
        $this->orders = $orders;
        $this->user = $user;
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

    public function edit($id)
    {
        $userinfo = $this->user;
        $user = $userinfo->find($id);
        return view('profile.user.setting',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = $this->user->find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if (strlen($request->get('password')) > 1){
            $user->password = Hash::make($request->get('password'));
        }
        $user->save();
        return redirect()->route('profile.index');
    }
}
