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
        $user_id = Auth::user()->id;
        
        $create = Folder::create([
            'folder_name'=>     $request->input('folder_name'),
            'user_id'=>         $user_id,
            'branch_name' =>    $request->input('branch_name'),
            'perent_folder' =>  $request->input('perent_folder'),
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
        
        Folder::where('id',$folder->id)->update(['status'=>'deleted']);
        $url = url()->previous();
        while (is_numeric(substr($url, -1)) ==  "true") {
            $url = substr($url, 0,-1);
        }
        $final_url =  $url;
        return redirect($final_url);


        
        

    }
    public function root ($branch_name)
    {
        
        $folders = Folder::where('branch_name',$branch_name)
                            ->where('perent_folder',NULL)
                            ->where('status' , NULL)
                            ->orderBy('folder_name')->get();
        $current_folder = NULL;

        return view('document.branch' , compact(['folders' , 'branch_name' , 'current_folder']));
    }
    public function branchDoc($x = '')
    {
        $path = explode('/', $x);
        
        if (count($path) == 1)
        { 
           return $this->root($x);
        }
        
        $folders        = Folder::where('perent_folder',end($path))
                                    ->where('status' , NULL)
                                    ->orderBy('folder_name')->get();
        
        $branch_name    = $path['0'];
        $current_folder = last($path);
        $documents      = Document::where('folder_id',$current_folder)->get();
        $folder_name = [$branch_name];
        
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
                                                
                                                ]));
        
    }
    

    
}
