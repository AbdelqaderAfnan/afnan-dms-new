<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;
class UserController extends Controller
{
    //This will show the user data
    //Input user id return user row
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
        
        $user = User::findOrFail(request('id'));
        $user->fill($request->all())->save();
        return redirect()->route('profile.show',Auth::user()->id)
                        ->with('success','Profile has been updated');
    }
}