<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    protected $users;

    public function __construct(User $user)
    {
        $this->users = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
           'name' => 'required|alpha-num|min:6|max:100',
           'email' => 'required|email',
           'password' => 'required|min:6'
        ]);
        $create = $this->users->create($request->only([
            'name','email','password','role_id'
        ]));
        if ($create){
            $request->session()->flash('done','کاربر مورد نظر با موفقیت افزوده شد');
        }else{
            $request->session()->flash('didnt','افزودن کاربر با خطا روبرو شد');
        }
        return redirect()->route('users.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->users->find($id);
        return view('admin.users.edit',compact('user'));
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
            'name' => 'required|alpha-num|min:6|max:100',
            'email' => 'required|email'
        ]);

        $user = $this->users->find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if (strlen($request->get('password')) > 1){
            $user->password = Hash::make($request->get('password'));
        }
        $user->role_id = $request->get('role_id');
        if ($user->save()){
            $request->session()->flash('done','کاربر مورد نظر با موفقیت ویرایش شد');
        }else{
            $request->session()->flash('didnt','ویرایش کاربر با خطا روبرو شد');
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $user = $this->users->find($id);

        if ($user->delete()){
            $request->session()->flash('done','کاربر مورد نظر با موفقیت حذف شد');
        }else{
            $request->session()->flash('didnt','حذف کاربر با خطا روبرو شد');
        }

        return redirect()->route('users.index');
    }
}
