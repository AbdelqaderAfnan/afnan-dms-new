<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
       return view('profile.show',['profile'=>$user]); 
    }
    public function edit(User $user)
    {
        
        
        return view('profile.edit',['profile'=>$user]);
    }
    public function update(Request $request, User $user)
    {
        $url =url()->previous();
        
        $user = User::findOrFail(request('id'));
        $user->fill($request->all())->save();
        if($url == "http://afnan-dms.test/cpanel/1/edit")
        {
            return redirect()->route('cpanel.index')
                        ->with('success','Profile has been updated');
        }
        else
        {
            return redirect()->route('profile.show',Auth::user()->id)
                        ->with('success','Profile has been updated');
        }
        
    }
    public function Destroy(User $user)
    {
        $user->delete();
        return redirect(url()->previous());
    }
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.cpanel.index' , ['users'=>$users]);
        
    }
}