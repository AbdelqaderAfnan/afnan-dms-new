@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4 text-center">
            <a href="{{route('doc_branch','baghdad')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Baghdad
            </a>
        </div>
        <div class="col-4 text-center">
            <a href="{{route('doc_branch','amman')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Amman
            </a>
        </div>
        <div class="col-4 text-center">
            <a href="{{route('doc_branch','erbil')}}">
            <p><img src="img/folder-icon.png" width="90px" height="90px" alt=""></p>
            Erbil
            </a>
        </div>
    </div>
</div>
@endsection
