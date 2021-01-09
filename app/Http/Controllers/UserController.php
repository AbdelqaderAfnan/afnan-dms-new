<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            
        ]);
        $user = User::findOrFail(request('id'));
        $user->fill($request->all())->save();
        if(str_contains($url ,"cpanel"))
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
    public function create()
    {
        return view('admin.cpanel.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $create =User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'isadmin' => '0',
            'branch_name' => $request['branch_name'],
        ]);
        $users = User::latest()->get();
        return view('admin.cpanel.index' , ['users'=>$users]);
        
    }
}