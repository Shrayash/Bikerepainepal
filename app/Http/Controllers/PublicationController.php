<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\speciality;
use App\publication;
use Validator;
use DB;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Storage;

class PublicationController extends VideoController
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
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            $speciality=speciality::all();
       
        return view('publication.createpublication')->with('speciality',$speciality);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request, [
            'pub_link'=>'nullable',
            'pub_name'=>'required',
            'description'=>'required',
            'type'=>'required',
            'category'=>'required'
        ]);
       
            $user = auth()->user();
                $publication = new publication();
                $publication->user_id=auth()->user()->id;
                $publication->pub_link = $request->get('pub_link');
                $publication->pub_name = $request->get('pub_name');
                $publication->author_name = $user->name;
                $publication->description = $request->get('description');
                $publication->speciality = $request->get('type');
                $cat=$publication->category = $request->get('category');
                if ($cat=="video"){
                    $publication->file = $request->get('video_link');
                }
                else{
                    $this->validate($request, [
                        'file'=>'required|mimetypes:application/pdf|max:10000'
                    ]);
                    if($request->hasFile('file')){
                        $filenamewithExt = $request->file('file')->getClientOriginalName();
                        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
                        $extension = $request->file('file')->getClientOriginalExtension();
                        $fileNameToStore = $filename.'_'.time().'.'.$extension;
                        $path = $request->file('file')->move('storage/pdfs/',$fileNameToStore);
                        }else{
                            $fileNameToStore = 'nofile.pdf';
                        }
            
                        $publication->file = $fileNameToStore;
                }
                $publication->save();
          
        
            return redirect()->route('admin.index');
             
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       
            $publication = publication::find($id);
            $speciality=speciality::all();
        
        return view('publication.editpublication')->with('publication',$publication)->with('speciality',$speciality);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
                $publication = publication::find($id);
                $publication->user_id=auth()->user()->id;
                $publication->pub_link = $request->get('pub_link');
                $publication->pub_name = $request->get('pub_name');
                $publication->author_name = $request->get('author_name');
                $publication->description = $request->get('description');
                $publication->speciality = $request->get('speciality');
                $cat=$publication->category = $request->get('category');
                if ($cat=="video"){
                    $publication->file = $request->get('video_link');
                }
                else{
                    if ($publication->file){
                       
                            Storage::delete('/storage/pdfs/'.$publication->file);
                    }
                    if($request->hasFile('file')){
                        $filenamewithExt = $request->file('file')->getClientOriginalName();
                        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
                        $extension = $request->file('file')->getClientOriginalExtension();
                        $fileNameToStore = $filename.'_'.time().'.'.$extension;
                        $path =$request->file('file')->move('storage/pdfs/',$fileNameToStore);
                        }else{
                            $fileNameToStore = 'nofile.pdf';
                        }
            
                        $publication->file = $fileNameToStore;
                }
                $publication->save();
            
       
            return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
                $publication = publication::find($id);
                $publication->delete();
                if($publication){
                    return redirect()->route('admin.index')->with(['message'=> 'Publication Removed Sucessfully']);
                    }
                    else{
                        return redirect()->route('admin.index')->with(['error'=> 'Error while deleting!!']);
                    }
           
    }
}
