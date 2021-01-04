@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4 text-center" style="padding-top: 30px">
            <a href="{{route('doc_branch','amman')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Amman
            </a>
        </div>
        <div class="col-4 text-center" style="padding-top: 30px">
            <a href="{{route('doc_branch','ammantobaghdad')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Amman To Baghdad
            </a>
        </div>
        <div class="col-4 text-center" style="padding-top: 30px">
            <a href="{{route('doc_branch','ammantoerbil')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Amman To Erbil
            </a>
        </div>
        
        <div class="col-4 text-center" style="padding-top: 30px">
            <a href="{{route('doc_branch','baghdad')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Baghdad
            </a>
        </div>
        <div class="col-4 text-center" style="padding-top: 30px">
            <a href="{{route('doc_branch','baghdadtoamman')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Baghdad To Amman
            </a>
        </div>
        <div class="col-4 text-center" style="padding-top: 30px">
            <a href="{{route('doc_branch','baghdadtoerbil')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Baghdad To Erbil
            </a>
        </div>
        
        
        <div class="col-4 text-center" style="padding-top: 30px">
            <a href="{{route('doc_branch','erbil')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Erbil
            </a>
        </div>
        <div class="col-4 text-center" style="padding-top: 30px">
            <a href="{{route('doc_branch','erbiltoamman')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Erbil To Amman
            </a>
        </div>
        <div class="col-4 text-center" style="padding-top: 30px">
            <a href="{{route('doc_branch','erbiltobaghdad')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Erbil To Baghdad
            </a>
        </div>
    </div>
</div>
@endsection
