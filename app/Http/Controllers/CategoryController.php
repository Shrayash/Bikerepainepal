<?php

namespace App\Http\Controllers;

use App\User;
// use App\videos;
// use App\video_contents;
use App\category;
use Validator;
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

    public function create()
    {
        $category = category::all();
        return view('category.create')->with('category',$category);
    }

    public function store(Request $request)
    {

        $values = array(
            'category_name' => 'required',
            'description' => 'required'
          );
          $error = Validator::make($request->all(), $values);
          if($error->fails())
          {
            // return Redirect::to('register')->withErrors($error);
          return response()->json([
            'error'  => $error->errors()->all()
          ]);
          }


          $category = new category();
          $category->category_name = $request->get('category_name');
          $category->slug = Str::slug($category->category_name);
          $category->description = $request->get('description');
          $category->save();

          return redirect()->route('category.create')->with(['message'=> 'Category Added Sucessfully! View table below for details.']);

    }

    public function edit($id)
    {
      // dd('here');
        // $category = [];
        $category = category::findOrfail($id);
        return view('category.edit',['category'=>$category,'id'=>$id]);
      
    }

    public function update(Request $request, $id)
    {
        $values = array(
            'category_name' => 'required',
            'description' => 'required'
          );
          $error = Validator::make($request->all(), $values);
          if($error->fails())
          {
            // return Redirect::to('register')->withErrors($error);
          return response()->json([
            'error'  => $error->errors()->all()
          ]);
          }


          $category =category::find($id);
          $category->category_name = $request->get('category_name');
          $category->slug = Str::slug($category->category_name);
          $category->description = $request->get('description');
          $category->save();

          return redirect()->route('category.edit',$id)->with(['message'=> 'Category Updated Sucessfully']);
      
    }

    public function delete($id)
    {
        
                $category = category::find($id);
                $category->delete();
                if($category){
                    return redirect()->route('category.create')->with(['message'=> 'Category Removed Sucessfully']);
                    }
                    else{
                        return redirect()->route('category.create')->with(['error'=> 'Error while deleting!!']);
                    }
           
    }
    
}
