<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(5);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postSingUp(Request $request)
    {
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->pass);
        // $data->power = $request->power;
        $data->save();
        return redirect()->back()->with('massege','Đăng ký thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = User::find($id);
        $data->power = $request->power;
        $data->save();
        return redirect()->back()->with('massege','thay đổi quyền thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postSignIn(Request $request)
    {
        //
        $email = $request->email;
        $password = $request->pass;
        if(Auth::attempt(['email' => $email, 'password' => $password, 'power' => 1]))
        {
            return redirect()->route('homeAdmin');
        }
        elseif(Auth::attempt(['email' => $email, 'password' => $password, 'power' => null]))
        {
            return redirect()->route('home');
        }
        else{
            return redirect()->back()->with('error','đăng nhập thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function signOut()
    {
        //
        Auth::logout();
        return redirect()->route('home');
    }
}
