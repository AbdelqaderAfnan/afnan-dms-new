@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex bd-highlight mb-4">
            <div class="p-2 w-100 bd-highlight">
                <h2 style="text-transform: uppercase;">
                    
                        Manage Users
                    
                </h2>
                
                
            </div>
            <div class="p-2 flex-shrink-0 bd-highlight">
                
                
                <button class="btn btn-success" id="btn-add">
                    Manage Role
                </button>
                
                <a href="{{route('home')}}" class="btn btn-primary">
                    Back
                </a>
            </div>
        </div>
        <div class="row">
            <table class="table text-center" style="border: 1px solid gray" >
                <thead style="">
                    <tr style="background: #b0b8bf">
                        <th >User Name</th>
                        <th>Branch</th>
                        <th>Is Admin</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td class="text-center">{{$user->name}}</td>    
                            <td class="text-center">{{$user->branch_name}}</td>    
                            <td class="text-center">{{$user->isadmin}}</td>    
                            <td class="text-center">{{$user->email}}</td>    
                            <td></td>
                            <td style="width: 19%" class="text-center">
                                <button class="btn btn-primary">Show</button>
                                <button class="btn btn-secondary">Edit</button>
                                <form action="{{route('users.destroy',$user->id )}}" method="POST" style="display: inline">
                                    @method('delete')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Delete" name="submit">
                                </form>
                            </td>
                        </tr>    
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection