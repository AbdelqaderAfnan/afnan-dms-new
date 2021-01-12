
@extends('layouts.app')
@section('content')
<?php
    session()->put('back_url', url()->previous());
?>
<div class="container">
    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
            <h2 style="text-transform: uppercase;">
                {{$document->branch_name}} Branch
            </h2>
            <span>{{$document->branch_name}}/{{$document->folder->folder_name}}</span>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
            
            
           
            @if (Auth::user()->isadmin == 1 or Auth::user()->id == $document->id)
                <form method="POST" action="{{route ('document.destroy', $document)}}"
                    style="display: contents;">
                    
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Please confirm you want to delete!')">Delete</button>
                </form> 
            @endif
            <a class="btn btn-success" href="{{route('download' , [$document->branch_name,$document->folder_id ,$document->document])}}">
                Download
            </a>
            
            <a href="{{url()->previous()}}" class="btn btn-primary">
                Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <iframe   
            src="{{ URL::to('/') . "/images"."/". $document->branch_name . "/" . $document->folder_id . "/" . $document->document}}"
            height="1000px" width="100%"  title="Iframe Example" ></iframe>
        </div>
    </div>
</div>
@endsection