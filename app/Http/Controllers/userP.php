<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userPC;
use Hash;
use Session;
use isEmpty;
class userP extends Controller
{
    public function showreg()
    {
        return view('registration');
    }

    public function showlogin()
    {
        return view('login');
    }

    public function showuser()
    {
        return view('showuser');
    }

    public function registerU(Request $request)
    {

        $request->validate([
            'name' =>'required|min:3',
            'email' =>'required|email|unique:user_p_c_s',
            'password' =>'required|min:6',
            'cpassword' =>'required|same:password'
        ]);


        $data=new userPC();
        $data->name=$request->get('name');
        $data->email=$request->get('email');
        $data->password=Hash::make($request->get('password'));
        $result=$data->save();
        if($result){
            return redirect()->back()->with('success','Registered Successfully');
        }else{
            return redirect()->back()->with('fail','Something Went Wrong');
        }
    }

    public function loginU(Request $request)
    {
    $request->validate([
        'email' =>'required|email',
        'password' =>'required',
    ]);

    $user=userPC::where('email', $request->get('email'))->first();
    if ($user && (Hash::check($request->password, $user->password))) {
        $request->session()->put('userid', $user);
        return redirect('userpage');
    } else {
        return redirect()->back()->with('fail', 'Something Went Wrong');
    }
}


    public function logoutUser()
    {
        if (session()->has('userid')){
            session()->flush('userid');
            return redirect('login');
        }
    }



    public function changepasswordU(Request $request,$id)
    {
        $request->validate([
            'password' =>'required',
            'cpassword' =>'required|same:password'
        ]);

        $user=userPC::find($id);
        $user->password=Hash::make($request->get('cpassword'));
        $result=$user->save();
        if($result){
            return redirect()->back()->with('success','password has update');
        }else{
            return redirect()->back()->with('fail','Something Went Wrong');
        }

    }

}

