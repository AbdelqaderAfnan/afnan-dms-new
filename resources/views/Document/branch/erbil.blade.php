@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary text-center" onclick="myFunction()">
                    Add New Folder
                </button>
            </div>
        </div>        
        <p id="demo"></p>
    </div>

    <script>
        function myFunction()
        {
            
            var folder = prompt("Please enter your name:", "folder name");
            if (folder == null || folder == "")
            {
                txt = "User cancelled the prompt.";
            }
            
            document.getElementById("demo").innerHTML = folder;
            
        }
    </script>
@endsection