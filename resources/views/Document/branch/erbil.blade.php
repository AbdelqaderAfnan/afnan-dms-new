@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="d-flex bd-highlight mb-4">
            <div class="p-2 w-100 bd-highlight">
                <h2>Erbil Branch</h2>
            </div>
            <div class="p-2 flex-shrink-0 bd-highlight">
                <button class="btn btn-success" id="btn-add">
                    Add New Folder
                </button>
                <a href="{{route('home')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div>
            <table class="table table-inverse">
                <thead>
                    <tr>
                        <th>Folder Name</th>
                        <th>Create By</th>
                        <th>Create At</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($folders as $folder)
                        <tr>
                            <td><a href="">{{$folder->folder_name}}</a></td>
                            <td>{{$folder->cerate_by}}</td>
                            <td>{{$folder->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="formModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="formModalLabel">Add New Folder</h4>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
    
                                <div class="form-group">
                                    <label>Folder Name</label>
                                    <input type="text" class="form-control" id="folder_name" name="folder_name"
                                            placeholder="Enter folder name" value="">
                                </div>
    
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                            </button>
                            <input type="hidden" id="todo_id" name="todo_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    
    
@endsection