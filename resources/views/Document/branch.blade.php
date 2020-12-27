@extends('layouts.app')

@section('content')

<?php 
    $test_url = "http://afnan-dms.test/folders/branch/".$branch_name;
    if(url()->current() == $test_url)
    {
        $final_url =  route('home');
    }
    else
    {
        $url = url()->current();
        while (is_numeric(substr($url, -1)) ==  "true") {
            $url = substr($url, 0,-1);
        }
        $final_url =  $url;
    }
?>
    <div class="container">
        <div class="d-flex bd-highlight mb-4">
            <div class="p-2 w-100 bd-highlight">
                <h2 style="text-transform: uppercase;">
                    <a style="color: black" href="http://afnan-dms.test/folders/branch/{{$branch_name}}">
                        {{$branch_name}} Branch
                    </a>
                </h2>
                @foreach ($folder_name as $name)
                    <span>{{$name}} /</span>

                @endforeach
                
            </div>
            <div class="p-2 flex-shrink-0 bd-highlight">
                @if ($final_url != route('home'))
                    <button class="btn btn-success" id="btn-add-document">
                        Add Document
                    </button>    
                @endif
                
                <button class="btn btn-success" id="btn-add">
                    Add Folder
                </button>
                @if ($final_url != route('home'))
                    <form method="POST" action="{{route ('folder.destroy', $current_folder)}}"
                                        style="display: contents;">
                                        
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Please confirm you want to delete!')">Delete</button>
                    </form>    
                
                @endif
                <a href="{{$final_url}}" class="btn btn-primary">
                    Back
                </a>
            </div>
        </div>
        
        <div>
            <table class="table table-inverse">
                <thead>
                    <tr>
                        <th style="padding:0px ; width: 44%">Folder Name</th>
                        <th style="padding:0px ; width: 20%">Create By</th>
                        <th style="padding:0px ; width: 18%">Create At</th>
                        <th style="padding:0px ; width: 18%">Update At</th>
                    </tr>
                </thead>
                <tbody id="folder_list">
                    @foreach ($folders as $folder)
                        
                            <tr id='folder{{$folder->id}}'>
                                <td style="padding:0px">
                                        <a href="<?php echo url()->current();
                                                    echo '/'.$folder->id;
                                        ?>">
                                            {{$folder->folder_name}}
                                        </a>
                                </td>
                                <td style="padding:0px">{{$folder->user->name}}</td>
                                <td style="padding:0px">{{$folder->created_at}}</td>
                                <td style="padding:0px">{{$folder->updated_at}}</td>
                            </tr>
                        
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="formModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="formModalLabel">Create Folder</h4>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
                                <div class="form-group">
                                    <label>Enter Folder Name</label>
                                    <input type="text" class="form-control" id="folder_name" name="folder_name"
                                            placeholder="Enter Folder Name" value="">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="branch_name" name="branch_name"
                                            value="{{$branch_name}}">
                                </div>
                                <div class="form-group">           
                                    <input type="hidden" class="form-control" id="user_id" name="user_id"
                                            value="{{Auth::user()->id}}">
                                </div>
                                @csrf
                                <div class="form-group">           
                                    <input type="hidden" class="form-control" id="perent_folder" name="perent_folder"
                                            value="{{$current_folder}}">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                            </button>
                            <button type="button" class="btn btn-primary" id="btn-back" value="back">Back</button>
                            <input type="hidden" id="folder_id" name="folder_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
            @if ($final_url != route('home'))
            <div class="modal fade" id="formModal-document" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title-document" id="formModalLabel-document">
                                Create Folder
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form id="myForm-document" name="myForm-document" class="form-horizontal" novalidate="">
                                <div class="form-group">
                                    <label>Enter Folder Name</label>
                                    <br>
                                    <input id="file-1" type="file" name="file" multiple class="file"  data-min-file-count="4">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="branch_name" name="branch_name"
                                            value="{{$branch_name}}">
                                </div>
                                <div class="form-group">           
                                    <input type="hidden" class="form-control" id="user_id" name="user_id"
                                            value="{{Auth::user()->id}}">
                                </div>
                                @csrf
                                <div class="form-group">           
                                    <input type="hidden" class="form-control" id="perent_folder" name="perent_folder"
                                            value="{{$current_folder}}">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save-document" value="add">Save changes
                            </button>
                            <button type="button" class="btn btn-primary" id="btn-hide" value="back">Back</button>
                            <input type="hidden" id="folder_id" name="folder_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>  


    
    
@endsection