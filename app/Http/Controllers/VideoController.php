<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostFormRequest;
use App\Exceptions\NotFoundException;

use Illuminate\Http\Request;
use App\User;
use App\videos;
use App\video_contents;
use App\group;
use App\publication;
use App\allnames;
use App\category;
use Illuminate\Support\Str;
use Validator;
use DB;

class VideoController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
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
      // try{
      // $videos = videos::where('user_id', '=', auth()->user()->id)->latest()->paginate(5,['*'],'videos');
      // $publication = publication::where('user_id', '=', auth()->user()->id)->latest()->paginate(5,['*'],'publications');
      // $users = User::role('admin')->latest()->get();

      // $video_user = DB::table('users')
      // ->whereExists(function ($query) {
      //     $query->from('videos')
      //           ->whereRaw('videos.user_id = users.id');
      // })
      // ->paginate(5,['*'],'videos_user');

      // $publication_user = DB::table('users')
      // ->whereExists(function ($query) {
      //     $query->from('publications')
      //           ->whereRaw('publications.user_id = users.id');
      // })
      // ->paginate(5,['*'],'publications_user');
      // return view('video.managecontent')->with('users',$users)->with('videos',$videos)->with('publication',$publication)->with('video_user',$video_user)->with('publication_user',$publication_user);
      return view('admin.adminhome');
    }

    public function create()
    {
      // try{
      $categories = category::all();
      $groups = group::all();
    // } catch(\Exception $exception) { 
    //   throw new NotFoundException();
    // }
        return view('video.createcontent')->with('categories',$categories)->with('groups',$groups);
    }

    public function store(Request $request)
    {
        if($request->ajax())
     {
      $values = array(
        'group' => 'required',
        'department' => 'required',
        'video_description' => 'required',
        'video_lecture' => 'required'
      );
      $error = Validator::make($request->all(), $values);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

      // try{
        $video=[];
        $videocontent = [];
          
        $video['user_id'] = auth()->user()->id;
        $video['group'] = $request->get('group');
        $video['department'] = $request->get('department');
        $video['video_lecture'] = $request->get('video_lecture');
        $video['video_description'] = $request->get('video_description');
       
        $video['contentby'] = "SMF Health Portal";
        $video['speaker'] = auth()->user()->name;
        $video['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
        $video['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
      $id = DB::table('videos')->insertGetId($video);
      
    
       $videocontent['name'] = $request->get('name');
       $videocontent['description'] = $request->get('contentdescription');
       $videocontent['link'] = $request->get('link');
      
          $maxcount= ['name'];
        for($count = 0; $count < $maxcount ; $count++)
        {
            
         $data = array(
          'parent_id' => $id,
          'name' =>  $videocontent['name'][$count],
          'description'  => $videocontent['description'][$count],
          'link'  =>  $videocontent['link'][$count]
         );
         $insert_data[] = $data; 
        }
      
        video_contents::insert($insert_data);
      // } catch(\Exception $exception) { 
      //   throw new NotFoundException();
      // }
              return response()->json([
         'success'  => 'Data Added successfully.'
        ]);
      

    
      // return redirect()->route('admin.index')->with('success','Saved Sucessfully');
     }
    }

   

    public function edit($id)
    {
      
        $videocontent = [];
        $videos = videos::find($id);
        $videocontent = DB::table('video_contents')->where('video_contents.parent_id','=',$id)->get()->toArray();
        $categories = category::all();
        $groups = group::all();
        // dd('here');
      
        // $videos = DB::table('videos')->join('video_contents','video_contents.parent_id','=','videos.id')->where('video_contents.parent_id','=',$id)->get();

        return view('video.editcontent',['videos' => $videos])->with('videocontent',$videocontent)->with('categories',$categories)->with('groups',$groups);
      
    }

    public function update(Request $request, $id)
        {
          if($request->ajax())
      {
        $values = array(
          'group' => 'required',
          'department' => 'required',
          'video_description' => 'required',
          'video_lecture' => 'required'
        );
        $error = Validator::make($request->all(), $values);
        if($error->fails())
        {
        return response()->json([
          'error'  => $error->errors()->all()
        ]);
        }

        
        $video=[];
        $videocontent = [];
          
       
        $video['user_id'] = auth()->user()->id;
        $video['group'] = $request->get('group');
        $video['department'] = $request->get('department');
        $video['video_lecture'] = $request->get('video_lecture');
        $video['video_description'] = $request->get('video_description');
        
        $video['contentby'] = $request->get('contentby');
        $video['speaker'] = $request->get('speaker');
        $video['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
        $video['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
        DB::table('videos')->where('id',$id)->update($video);
      

      $videocontent['name'] = $request->get('name');
      $videocontent['description'] = $request->get('contentdescription');
      $videocontent['link'] = $request->get('link');
      
        $maxcount=count($videocontent['name']);
        $video_id = DB::table('video_contents')->where('parent_id',$id)->select('id')->get();
        // $database= DB::table('video_contents')->where('parent_id',$id);
        for($count = 0; $count < $maxcount ; $count++)
        {
          $v_id= (count($video_id)>$count) ? $video_id[$count]->id : 0;
          $databases = video_contents::updateOrCreate(
            ['id'=>$v_id, 'parent_id'=>$id],
            ['parent_id' => $id,
            'name' =>  $videocontent['name'][$count],
            'description'  => $videocontent['description'][$count],
            'link'  =>  $videocontent['link'][$count]]
        );
        //   $database->updateOrInsert(
        //     ['id'=>$video_id[$count]->id],
        //     ['parent_id' => $id,
        //     'name' =>  $videocontent['name'][$count],
        //     'description'  => $videocontent['description'][$count],
        //     'link'  =>  $videocontent['link'][$count]]
        // );
          // $database->where('id', $video_id[$count]->id)->update(['parent_id' => $id,
          //                                                       'name' =>  $videocontent['name'][$count],
          //                                                       'description'  => $videocontent['description'][$count],
          //                                                       'link'  =>  $videocontent['link'][$count]]);
        }

        return response()->json([
        'success'  => 'Data Updated successfully.'
        ]);
        return redirect()->route('admin.index');
      }
    }

    public function destroy($id)
    {
    
        $videos = videos::find($id);
        $videos->delete();
        if($videos){
          return redirect()->route('admin.index')->with(['message'=> 'Video Removed Sucessfully']);
          }
          else{
              return redirect()->route('admin.index')->with(['error'=> 'Error while deleting!!']);
          }

    }
    
    public function destroy_content($id)
    {
    
        $videos = video_contents::find($id);
        $videos->delete();

        if($videos){
          return redirect()->route('video.edit',$videos->parent_id)->with(['message'=> 'Video Removed Sucessfully']);
          }
          else{
              return redirect()->route('video.edit',$videos->parent_id)->with(['error'=> 'Error while deleting!!']);
          }

    }

    // public function catindex()
    // {
    //     $category = category::all();
    //     $video = videos::all();
    //     return view('categories.main')->with('category',$category)->with('video',$video);
    // }


    
}
