<?php

namespace App\Http\Controllers;

use Response; 
use App\Models\Document;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\File;
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
                $images[] =$file; 
                $name=$file->getClientOriginalName();
                
                
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                $test_document = DB::table('documents')->where('document' , $name)
                                                ->where('ext' , $ext)
                                                ->where('folder_id' , $input['folder_id'])
                                                ->count();
                
                $file->move(public_path('images'."\\" .$request['branch_name']."\\".$request['folder_id']), $name);
                if($test_document == 0)
                {
                    Document::create( [
                             'doc_type' => $ext,
                            'document'=>  $name,
                            'ext'=>  $ext,
                            'user_id' =>$input['user_id'],
                            'folder_id' =>$input['folder_id'],
                            'branch_name' => $input['branch_name'],
                        ]);
                    
                }
                else
                {
                    //do nothing

                }
                // $images[]=$name; 
            }
        }
        return redirect(url()->previous());

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
  
        return view('Document.show',['document'=>$document]);
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
        
        $destinationPath = public_path('images'."\\".$document->branch_name ."\\".
                            $document->folder_id);
        $delete = unlink($destinationPath.'/'.$document->document);
        $document->delete();
        $url_test = url()->previous();
        $url_previous = session('back_url');
        if(str_contains($url_test ,"branch"))
        {
            return redirect(url()->previous());
        }    
        else
        {
            return redirect($url_previous);
        }
    }
    
}
