<?php

namespace App\Http\Controllers;
use App\Models\Places;
use App\Models\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $place;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Places $places)
    {
        $this->place = $places;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = $this->place->all();
        return view('site.index',compact('places'));
    }

    public function show($id)
    {
        $places = $this->place
            ->with('categories')
            ->get();

        //var_dump($place->find($id)->toArray());
        $place = $places->find($id);
        return view('site.place',compact(['place']));
    }
}
