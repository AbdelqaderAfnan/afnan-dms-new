<?php

namespace App\Http\Controllers;

use Response; 
use App\Models\Folder;
use Illuminate\Http\Request;
use DB;
use Auth;
class FolderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $create = Folder::create([
            'branch_name' => $request->input('branch_name'),
            'user_id'=> $user_id,
            'folder_name'=> $request->input('folder_name'),
        ]);
        //$create = $request->input('user_id');
        
        return Response::json($create);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {
        //
    }
    public function branchDoc ($branch_name)
    {
        $folders = Folder::latest()->paginate(5);
        
        return view('document.branch' , compact(['folders' , 'branch_name']));
    }
    // public function all_folders($x = '')
    // {
    //     $path = explode('/', $x);
    //     // $path is an array with the directory structure
    //     // Do whatever you want with it e.g.
    //     if (empty($path)) {
    //         return $this->index();
    //     } 
    // }s
}
