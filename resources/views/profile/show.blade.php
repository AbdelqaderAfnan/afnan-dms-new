@extends('layouts.app')
<style>
    .row{padding-bottom: 10px;}
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="text-center">Profile</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span class="float-right font-weight-bold">Name</span>
            </div>
            <div class="col-6">
                {{$profile->name}}
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span class="float-right font-weight-bold">E-Mail</span>
            </div>
            <div class="col-6">
                {{$profile->email}}
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span class="float-right font-weight-bold">Branch Name</span>
            </div>
            <div class="col-6">
                {{$profile->branch_name}}
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span class="float-right font-weight-bold">birthday</span>
            </div>
            <div class="col-6">
                {{$profile->birthday}}
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span class="float-right font-weight-bold">address</span>
            </div>
            <div class="col-6">
                {{$profile->address}}
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span class="float-right font-weight-bold">phone_number</span>
            </div>
            <div class="col-6">
                {{$profile->phone_number}}
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span class="float-right font-weight-bold">position</span>
            </div>
            <div class="col-6">
                {{$profile->position}}
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span class="float-right font-weight-bold">image</span>
            </div>
            <div class="col-6">
                {{$profile->image}}
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3">
                <a style="width: 100%" class="btn btn-primary"
                    href="{{route('profile.edit',Auth::user()->id)}}">Edit</a>
            </div>
        </div>
    </div>
@endsection