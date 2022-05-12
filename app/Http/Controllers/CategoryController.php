<?php

namespace App\Http\Controllers;

use App\User;
use App\videos;
use App\video_contents;
use App\category;
use DB;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */


    public function home()
    {
        return view('home')->with('message','Namaste!');
    }

    public function index()
    {
        try{
                $category = category::all();
                $video = videos::where('status',1)->get();
                $videos=videos::orderBy('created_at', 'DESC')->where('status',1)->get();

                $groups = $videos->reduce(function ($carry, $videos) {
                // get first letter
                $first_letter = $videos['video_lecture'][0];
                // dd($first_letter);
                if ( !isset($carry[$first_letter]) ) {
                    $carry[$first_letter] = [];
                }
                $carry[$first_letter][] = $videos;
            
                return $carry;

                }, []);
        } catch(\Exception $exception) { 
            throw new NotFoundException();
        }
        return view('categories.main')->with('category',$category)->with('video',$video)->with('groups',$groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        try{
            $category = category::findOrFail($id);
            $name=$category->id;
            $videos= videos::where('department',$name)->where('status',1)->get(); 
            $videocontents = video_contents::all();
            $categories = category::all();
        } catch(\Exception $exception) { 
            throw new NotFoundException();
        }
        return view('category.main')->with('videos',$videos)->with('videocontents',$videocontents)->with('category',$category)->with('categories',$categories);

       
    }

    public function allname()
    {
      
                $videos=videos::orderBy('video_lecture', 'asc')->where('status',1)->get();
                $groups = $videos->reduce(function ($carry, $videos) {
                // get first letter
                $first_letter = $videos['video_lecture'][0];
                
                if ( !isset($carry[$first_letter]) ) {
                    $carry[$first_letter] = [];
                }
                $carry[$first_letter][] = $videos;
                return $carry;

            }, []);
      
        return view('allnames.allnames')->with('groups',$groups);
    }



   
    public function search(Request $request)
    {
      $search_query = $request->search_query;

     if($request->ajax())
     {
      if($search_query != '')
      {
        $doc= User::where('status',1)->where('name', 'like', '%'.$search_query.'%')->get();
        $data= videos::where('status',1)->where('video_lecture', 'like', '%'.$search_query.'%')->get();
        
      }
      else
      {
        $data='Nothing to display';
        $doc ='Nothing to display';
      }

      return response()->json(array('data'=>$data,'doc'=>$doc));
     }else{
      
      
     }
    }
}
