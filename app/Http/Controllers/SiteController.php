<?php

namespace App\Http\Controllers;

use App\doctor_social_media;
use Illuminate\Http\Request;

class SiteController extends Controller
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
        
        $data = doctor_social_media::where('user_id', '=', auth()->user()->id)->first();
        
       
        if ($data === null) {
            return view('doctors.docmanagesite');
       } else{
           return view('doctors.docmanagesite_filled')->with('data',$data);
       }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $social_media = doctor_social_media::updateOrCreate(
            ['user_id' => auth()->user()->id],
            ['user_id'=>auth()->user()->id,'facebook' =>$request->get('facebook'), 'twitter' =>$request->get('twitter'),'youtube' => $request->get('youtube'), 'linkedin' =>$request->get('linkedin')]    
        );
        if($social_media){
            return redirect()->route('doctor_media')->with(['message'=> 'Social Media Sucessfully Updated']);
            }
            else{
                return redirect()->route('doctor_media')->with(['error'=> 'Error while updating!!']);
            }
        return redirect()->route('doctor_media');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // $id=1;
        // $social_media=doctor_social_media::all();
        // $social_media_id=doctor_social_media::find($id);
        
        // if($social_media['id']=='1'){
        //     return view('doctors.docmanagesite_filled')->with('social media',$social_media);
        // }
        // else {
        //     return view('doctors.docmanagesite');
        // }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
