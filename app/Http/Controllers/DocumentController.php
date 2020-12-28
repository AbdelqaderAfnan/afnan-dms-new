<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Auth;
use DB;

class DocumentController extends Controller
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
        $Document = Document::latest();
        return view('Document.index',['document'=>$Document]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path('images'."\\" .$request['branch_name']."\\".$request['folder_id']), $name);
                $images[]=$name;
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                Document::create( [
                    'doc_type' => $ext,
                    'document'=>  $name,
                    'user_id' =>$input['user_id'],
                    'folder_id' =>$input['folder_id'],
                    'branch_name' => $input['branch_name'],
        
                    //you can put other insertion here
                ]);
                
                
            }
        }
       
        
    
        dd($images);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('Document.show',['Document'=>$document]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('Document.edit',['Document'=>$document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $document = Document::findOrFail(request('id'));
        $document->fill($request->all())->save();
        return redirect()->route('Document.show')
                        ->with('success','Document has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('Document.index');
    }
    
}
