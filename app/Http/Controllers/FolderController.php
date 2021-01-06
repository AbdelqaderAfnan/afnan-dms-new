<?php

namespace App\Http\Controllers;

use Response; 
use App\Models\Folder;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Document;

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
        $folder_name = $request->input('folder_name');
        $perent_folder = $request->input('perent_folder');
        $user_id = Auth::user()->id;
        $test_uniqe = DB::table('folders')->where('folder_name' , '=' ,$request->input('folder_name'))
                                         ->where('perent_folder' , '=' ,$request->input('perent_folder'))
                                         ->get();
        $rowcount = $test_uniqe->count();
        
        if($rowcount == 0)
        {
            
            $create = Folder::create([
                'folder_name'   =>  $request->input('folder_name'),
                'user_id'       =>  $user_id,
                'branch_name'   =>  $request->input('branch_name'),
                'perent_folder' =>  $request->input('perent_folder'),
            ]);
            //$create = $request->input('user_id');
            return Response::json($rowcount);
            return Response::json($create);
        }
        else{
            return Response::json('folder name not uniqe');
        }
        
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
        Folder::where('id',$folder->id)->update(['status'=>'deleted']);
        $url = url()->previous();
        while (is_numeric(substr($url, -1)) ==  "true") {
            $url = substr($url, 0,-1);
        }
        return redirect($url);
    }
    public function root ($branch_name)
    {
        $folders = Folder::where('branch_name',$branch_name)
                            ->where('perent_folder',NULL)
                            ->where('status' , NULL)
                            ->orderBy('folder_name')->get();
        $current_folder = NULL;
        $folder_name = [$branch_name];
        $branch_name_url = $branch_name;



        if($branch_name == "erbiltoamman")
        {
            $branch_name = "erbil to amman";
        }
        elseif($branch_name  == "erbiltobaghdad")        
        {
            $branch_name = "erbil to baghdad";
        }
        elseif($branch_name  == "ammantoerbil")        
        {
            $branch_name = "amman to erbil";
        }
        elseif($branch_name  == "ammantobaghdad")        
        {
            $branch_name = "amman to baghdad";
        }
        elseif($branch_name  == "baghdadtoamman")        
        {
            $branch_name = "baghdad to amman";
        }
        elseif($branch_name  == "baghdadtoerbil")        
        {
            $branch_name = "baghdad to erbil";
        }
        


        return view('document.branch' , compact([
                                                'folders'       ,
                                                'branch_name'   ,
                                                'current_folder',
                                                'folder_name',
                                                'branch_name_url'
                                                ]));
    }
    public function branchDoc($x = '')
    {
        $path = explode('/', $x);
        
        if (count($path) == 1 )
        {
            return $this->root($x);
        }
        $perent = end($path);
        $current_folder = last($path);
        $branch_name    = $path['0'];
        
        if($branch_name == "erbiltoamman")
        {
            $branch_name = "erbil to amman";
        }
        elseif($branch_name  == "erbiltobaghdad")        
        {
            $branch_name = "erbil to baghdad";
        }
        elseif($branch_name  == "ammantoerbil")        
        {
            $branch_name = "amman to erbil";
        }
        elseif($branch_name  == "ammantobaghdad")        
        {
            $branch_name = "amman to baghdad";
        }
        elseif($branch_name  == "baghdadtoamman")        
        {
            $branch_name = "baghdad to amman";
        }
        elseif($branch_name  == "baghdadtoerbil")        
        {
            $branch_name = "baghdad to erbil";
        }
        

        $folders        = Folder::where('perent_folder',$perent)
                                ->where('status' , NULL)
                                ->orderBy('folder_name')->get();
        
        $branch_name_url = $path['0'];
        
        $documents      = Document::where('folder_id',$current_folder)->get();
        $folder_name    = [$branch_name];
        
        for($i=1 ; $i<count($path) ; $i++)
        {
            $folder = DB::table('folders')
                                ->select('id','folder_name')
                                ->where('id',$path[$i])->get();
            foreach ($folder as $fo)
            {
                
                array_push($folder_name, $fo->folder_name);
            }
        }
        
        return view('document.branch' , compact([
                                                'folders',
                                                'branch_name',
                                                'current_folder',
                                                'documents',
                                                'folder_name',
                                                'branch_name_url'
                                                ]));
        
    }
    

    
}
