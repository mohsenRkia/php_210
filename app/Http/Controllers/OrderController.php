<?php

namespace App\Http\Controllers;
use App\Models\Guests;
use App\Models\Orders;
use App\Models\Places;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    protected $order;
    protected $guest;
    protected $places;
    protected $categories;
    public function __construct(Orders $orders,Places $places,Categories $categories,Guests $guests)
    {
        $this->middleware('auth');
        $this->places = $places;
        $this->categories = $categories;
        $this->order = $orders;
        $this->guest = $guests;
    }
    public function first($id)
    {
        $place = $this->places->find($id);
        $cat = $this->categories->find($place->categories_id);
        return view('site.order.first',compact(['place','cat']));
    }

    public function submit($id,Request $request)
    {
        $persianf = $request->get('persianf');
        $persiant = $request->get('persiant');
        $checkin = $request->get('checkin');
        $checkout = $request->get('checkout');
        $rentdays = $request->get('rentdays');
        $persons = $request->get('persons');
        $place = $this->places->find($id);
        $price = $place->price;
        $totalprice = (int)$rentdays * $price;
        $name = $request->get('name');
        $family = $request->get('family');
        $mobile = $request->get('mobile');
        $nationalcode = $request->get('nationalcode');
        $decription = $request->get('decription');


        $request->session()->flash('checkin',$checkin);
        $request->session()->flash('checkout',$checkout);
        $request->session()->flash('rentdays',$rentdays);
        $request->session()->flash('persons',$persons);
        $request->session()->flash('totalprice',$totalprice);
        $request->session()->flash('name',$name);
        $request->session()->flash('family',$family);
        $request->session()->flash('mobile',$mobile);
        $request->session()->flash('nationalcode',$nationalcode);
        $request->session()->flash('decription',$decription);

        $cat = $this->categories->find($place->categories_id);
        return view('site.order.submit',compact(['place','cat','persianf','persiant']));
    }

    public function finall(Request $request)
    {

        $ordercode = time();
        $request->session()->flash('ordercode',$ordercode);
        $order = $this->order;
        $order->checkin = $request->get('checkin');
        $order->checkout = $request->get('checkout');
        $order->rentdays = $request->get('rentdays');
        $order->persons = $request->get('persons');
        $order->places_id = $request->get('place_id');
        $order->users_id = $request->get('user_id');
        $order->totallprice = $request->get('totalprice');
        $order->ordercode = $ordercode;
        $order->save();

        $order_id = $order->id;
        $guest = $this->guest;
        $guest->orders_id = $order_id;
        $guest->name = $request->get('name');;
        $guest->family = $request->get('family');;
        $guest->nationalcode = $request->get('nationalcode');;
        $guest->mobile = $request->get('mobile');;
        $guest->description = $request->get('decription');
        $guest->save();

        return view('site.order.finall');
    }
}
