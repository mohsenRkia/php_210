<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Categories;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Categories $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->all();
        return view('admin.category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
           'name' => 'required|min:4|max:50'
        ]);
        $create = $this->category->create($request->only(['name']));

        if ($create){
            $request->session()->flash('done','شهر مورد نظر با موفقیت افزوده شد');
        }else{
            $request->session()->flash('didnt','افزودن شهر با خطا روبرو شد');
        }

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->category->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->category->find($id);
        return view('admin.category.edit' , compact('categories'));
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
            'name' => 'required|min:4|max:50'
        ]);
        $categories = $this->category->find($id);
        $categories->name = $request->get('name');
        if ($categories->save()){
            $request->session()->flash('done','شهر مورد نظر با موفقیت ویرایش شد');
        }else{
            $request->session()->flash('didnt','ویرایش شهر با خطا روبرو شد');
        }

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $category = $this->category->find($id);
        if ($category->delete()){
            $request->session()->flash('done','شهر مورد نظر با موفقیت حذف شد');
        }else{
            $request->session()->flash('didnt','حذف شهر با خطا روبرو شد');
        }

        return redirect()->route('category.index');
    }
}
