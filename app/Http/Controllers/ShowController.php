<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\videos;
use App\doctor;
use App\doctor_social_media;
use App\video_contents;
use App\publication;
use App\category;
use App\speciality;
use DB;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show_bio($id)
    {
     
            $doctors=doctor::where('user_id',$id)->get();
            $videos = video_contents::where('parent_id',$id)->latest()->take(3)->get();
            $publications =publication::where('user_id',$id)->latest()->take(3)->get();
            $links=doctor_social_media::where('user_id',$id)->get();
            $columns = Schema::getColumnListing('doctor_social_media'); // users table
            $columns=collect($columns)->slice(2,4)->all();
      
        return view('doctors.bio')->with('doctors',$doctors)->with('links',$links)->with('columns',$columns)->with('videos',$videos)->with('publications',$publications);
    } 

    public function show_video($id)
    {
    
      $videocontent = [];
      $videos = videos::find($id);
      $video_cat= $videos->department;
      $similar_video = videos::where('department',$video_cat)->get();
      $previous = videos::where('id','<',$videos->id)->where('department',$video_cat)->max('id');
      $previous_name=videos::where('id','=',$previous)->get();
      $next = videos::where('id','>',$videos->id)->where('department',$video_cat)->min('id');
      $next_name=videos::where('id','=',$next)->get();
      $category = category::where('id',$video_cat)->get();
      $videocontent = DB::table('video_contents')->where('video_contents.parent_id','=',$id)->get()->toArray();
     
      return view('videocontent.main')->with('videos',$videos)->with('previous_name',$previous_name)->with('next_name',$next_name)->with('previous',$previous)->with('next',$next)->with('similar_video',$similar_video)->with('videocontent',$videocontent)->with('category',$category);
    }

    public function showall_video($id)
    {
    
      $videos = [];
      $videos= videos::where('user_id',$id)->where('status',1)->get(); 
      $videocontents = video_contents::all();
     
      return view('doctors.single_doctor')->with('videos',$videos)->with('videocontents',$videocontents);
    }

    public function show_pub($id)
    {
            $publication = publication::find($id);
            $latest = publication::latest()->take(3)->get();
            $related = publication::where('speciality',$publication->speciality)->latest()->take(3)->get();
            $speciality=speciality::all();
            $cat = $publication->category;
     
        if ($cat=="video"){
            return view('publication.publicationvideo')->with('publication',$publication)->with('related',$related)->with('speciality',$speciality)->with('latest',$latest);
        }else {
            return view('publication.publication')->with('publication',$publication)->with('related',$related)->with('speciality',$speciality)->with('latest',$latest);
        }
        
    }

    public function showall_pub($id)
    {
            $publications = publication::where('user_id','=',$id)->get();
            return view('doctors.single_pub')->with('publications',$publications);
        //     $latest = publication::latest()->take(3)->get();
        //     $related = publication::where('speciality',$publication->speciality)->latest()->take(3)->get();
        //     $speciality=speciality::all();
        //     $cat = $publication->category;
     
        // if ($cat=="video"){
        //     return view('publication.publicationvideo')->with('publication',$publication)->with('related',$related)->with('speciality',$speciality)->with('latest',$latest);
        // }else {
        //     return view('publication.publication')->with('publication',$publication)->with('related',$related)->with('speciality',$speciality)->with('latest',$latest);
        // }
        
    }

    public function pub_index()
    {
       
            $speciality=speciality::all();
            $publications = publication::where('category','docs')->where('status',1)->paginate(5,['*'],'publication');
            $latest = publication::latest()->where('status',1)->take(3)->get();
            $videos = publication::where('category','video')->where('status',1)->paginate(5,['*'],'video');
      
        return view('publication.all')->with('publications',$publications)->with('videos',$videos)->with('speciality',$speciality)->with('latest',$latest);
    }

    public function speciality($id)
    {
       
            $speciality=speciality::all();
            $publications = publication::where('speciality',$id)->where('status',1)->where('category','docs')->paginate(5,['*'],'publication');
            $videos = publication::where('speciality',$id)->where('status',1)->where('category','video')->paginate(5,['*'],'video');
            $latest = publication::latest()->where('status',1)->take(3)->get();
       
        if ($publications && $videos->isEmpty()  === true){
            return view('nocontent');
        } else {
        return view('publication.all')->with('publications',$publications)->with('videos',$videos)->with('speciality',$speciality)->with('latest',$latest);
         }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
