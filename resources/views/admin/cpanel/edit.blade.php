@extends('layouts.app')
<style>
    .row{padding-bottom: 10px;}
</style>
@section('content')
    <div class="container">
        <a href="{{route('users.index')}}" class="btn btn-primary">Back</a>
        <form action="{{route('profile.update', Auth::user()->id)}}" method="POST" class="">
            <div class="row">
                <div class="col-6 offset-3">
                    <h1 class="text-center">Edit Form</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="float-right font-weight-bold">Name</span>
                </div>
                <div class="col-6">
                    <input name="name" type="text" value="{{$user->name}}" class="form-control" width="75%">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="float-right font-weight-bold">E-Mail</span>
                </div>
                <div class="col-6">
                    <input name="email" type="text" value="{{$user->email}}" class="form-control" width="75%" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="float-right font-weight-bold">Branch Name</span>
                </div>
                <div class="col-6">
                    <select name="branch_name" id="branch_name" class="form-control">
                        <option value="amman">Amman</option>
                        <option value="baghdad">Baghdad</option>
                        <option value="erbil">Erbil</option>

                    </select>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="float-right font-weight-bold">Birthday</span>
                </div>
                <div class="col-6">
                    <input name="birthday" type="date" value="{{$user->birthday}}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="float-right font-weight-bold">Address</span>
                </div>
                <div class="col-6">
                    <input name="address" type="text" value="{{$user->address}}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="float-right font-weight-bold">Phone Number</span>
                </div>
                <div class="col-6">
                    <input name="phone_number" type="number" value="{{$user->phone_number}}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="float-right font-weight-bold">Position</span>
                </div>
                <div class="col-6">
                    <input name="position" type="text" value="{{$user->position}}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="float-right font-weight-bold">Is Admin</span>
                </div>
                <div class="col-6">
                    <select name="isadmin" id="isadmin" class="form-control">
                        @if ($user->isadmin == '0')
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        @else
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        @endif

                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <input type="submit" class="btn btn-primary" value="Save" style="width: 100% ; margin-bottom: 10px"
                            onclick="return confirm('are you sure?');">
                    
                </div>
            </div>
            <input type="hidden" name="id" value="{{Auth::user()->id}}">
            @csrf
            @method('put')
        </form>
        
    </div>
@endsection