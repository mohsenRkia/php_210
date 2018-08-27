<?php

namespace App\Http\Controllers;
use App\Models\Places;
use App\Models\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $place;
    protected $categories;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Places $places, Categories $categories)
    {
        $this->place = $places;
        $this->categories = $categories;
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
        $place = $this->place->find($id);
        $cat = $this->categories->find($place->categories_id);
        return view('site.place',compact(['place','cat']));
    }
}
