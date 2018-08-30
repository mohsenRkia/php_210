<?php

namespace App\Http\Controllers;
use App\Jobs\SendEmailJob;
use App\Mail\OrderSubmit;
use App\Models\Guests;
use App\Models\Orders;
use App\Models\Places;
use App\Models\Categories;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    protected $order;
    protected $guest;
    protected $places;
    protected $categories;
    protected $user;
    public function __construct(Orders $orders,Places $places,Categories $categories,Guests $guests,User $user)
    {
        $this->middleware('auth');
        $this->places = $places;
        $this->categories = $categories;
        $this->order = $orders;
        $this->guest = $guests;
        $this->user = $user;
    }
    public function first($id)
    {
        $places = $this->places
            ->with('categories')
            ->get();

        $place = $places->find($id);
        return view('site.order.first',compact(['place']));
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


        $currentuser = Auth::user()->id;
        $user = $this->user->find($currentuser);
        $userEmail = $user->email;

        $sendEmail = (new SendEmailJob($userEmail))->delay(Carbon::now()->addSeconds(3));
        dispatch($sendEmail);

        return view('site.order.finall');
    }
}
