<?php

namespace App\Http\Controllers;
use App\Models\Places;
use App\Models\Categories;
use App\User;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    protected $places;
    protected $category;
    protected $user;
    public function __construct(Places $places, Categories $categories,User $user)
    {
        $this->places = $places;
        $this->category = $categories;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = $this->places->all();
        return view('admin.place.index',compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->user->all();
        $categories = $this->category->all();
        return view('admin.place.create',compact(['users','categories']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'title' => 'required|min:8|max:100',
            'body' => 'required|min:10',
            'price' => 'required|numeric',
            'capacity' => 'required|numeric',
            'photo' => 'required|mimes:jpeg,bmp,png|max:200'
        ]);


        $photo = $request->file('photo');
        $photoName = time() . "_" .$photo->getClientOriginalName();
        $path = public_path().'/upload';
        $photo->move($path,$photoName);

        $places = $this->places;
        $places->users_id = $request->get('user_id');
        $places->title = $request->get('title');
        $places->body = $request->get('body');
        $places->price = $request->get('price');
        $places->capacity = $request->get('capacity');
        $places->categories_id = $request->get('category_id');
        $places->photo = $photoName;
        if ($places->save()){
            $request->session()->flash('done','اقامتگاه مورد نظر با موفقیت افزوده شد');
        }else{
            $request->session()->flash('didnt','افزودن اقامتگاه مورد نظر با خطا روبرو شد');
        }

        return redirect()->route('place.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->places->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->category->all();
        $places = $this->places->find($id);
        $cat = $this->category->find($places->categories_id);
        return view('admin.place.edit',compact(['places','categories','cat']));
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
        $this->validate($request,[
            'title' => 'required|min:8|max:100',
            'body' => 'required|min:8',
            'price' => 'required|numeric',
            'capacity' => 'required|numeric',
            'photo' => 'mimes:jpeg,bmp,png|max:200'
        ]);


        $places = $this->places->find($id);

        if ($request->file('photo')){
            $photo = $request->file('photo');
            $photoName = time() . "_" .$photo->getClientOriginalName();
            $path = public_path().'/upload';
            $photo->move($path,$photoName);
            $places->photo = $photoName;
        }

        $places->users_id = $request->get('user_id');
        $places->title = $request->get('title');
        $places->body = $request->get('body');
        $places->price = $request->get('price');
        $places->capacity = $request->get('capacity');
        $places->categories_id = $request->get('category_id');
        if ($places->save()){
            $request->session()->flash('done','اقامتگاه مورد نظر ویرایش شد');
        }else{
            $request->session()->flash('didnt','ویرایش اقامتگاه مورد نظر با خطا روبرو شد');
        }

        return redirect()->route('place.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $place = $this->places->find($id);
        if ($place->delete()){
            $request->session()->flash('done','اقامتگاه مورد نظر با موفقیت حذف شد');
        }else{
            $request->session()->flash('didnt','حذف اقامتگاه مورد نظر با خطا روبرو شد');
        }
        return redirect()->route('place.index');
    }
}
