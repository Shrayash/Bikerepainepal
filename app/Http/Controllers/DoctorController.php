<?php

namespace App\Http\Controllers;
use App\doctor;
use App\User;
// use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use DB;

class DoctorController extends Controller
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
        try{
                $user_id = auth()->user()->id;
                $user= User::find($user_id);
            } catch(\Exception $exception) { 
                throw new NotFoundException();
            }
    
        $data = doctor::where('user_id', '=', auth()->user()->id)->first();
         if ($data === null) {
            return view('doctors.index')->with('data',$data);
        } else{
            return view('doctors.index_update')->with('data',$data);
        }
         
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
        $this->validate($request, [
            'file'=>'required',
            'education'=>'required',
            'designation'=>'required',
            'description'=>'required'
        ]);
       
                if($request->hasFile('file')){
                    $filenamewithExt = $request->file('file')->getClientOriginalName();
                    $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
                    $extension = $request->file('file')->getClientOriginalExtension();
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    $path = $request->file('file')->move('storage/images/',$fileNameToStore);;
                    }else{
                        $fileNameToStore = 'nofile.pdf';
                    }
                // $data_name=User::updateOrCreate(
                //     ['id' => auth()->user()->id],
                //     ['name'=>$request->get('name')]    
                //     );

                $data = doctor::where('user_id', '=', auth()->user()->id)->first();
                if ($data === null) {
                    $data = doctor::updateOrCreate(
                        ['user_id' => auth()->user()->id],
                        ['user_id'=>auth()->user()->id, 'profilepic' =>$fileNameToStore, 'education' =>$request->get('education'),'post' => $request->get('designation'), 'description' =>$request->get('description')]    
                        );
                    } else {
                        $id=auth()->user()->id;
                        $user = User::find($id);
                        $user->name = $request->get('name');
                        $user->save();

                        $data = doctor::updateOrCreate(
                            ['user_id' => auth()->user()->id],
                            ['user_id'=>auth()->user()->id, 'profilepic' =>$fileNameToStore, 'education' =>$request->get('education'),'post' => $request->get('designation'), 'description' =>$request->get('description')]    
                        );
                    }
               
            if($data){
                return redirect()->route('doctor.bio')->with('data', $data)->with(['message'=> 'Doctor Bio Successfully added!!']);
                }
                else{
                    return redirect()->route('doctor.bio')->with('data', $data)->with(['error'=> 'Error While Adding Doctor Bio!!']);
                }
        
       
    }

    public function update(Request $request)
    {
        
            $data = doctor::where('user_id', '=', auth()->user()->id)->first();
            if ($data === null) {
                $data = doctor::updateOrCreate(
                    ['user_id' => auth()->user()->id],
                    ['user_id'=>auth()->user()->id, 'education' =>$request->get('education'),'post' => $request->get('designation'), 'description' =>$request->get('description')]    
                    );
                } else {
                    $id=auth()->user()->id;
                    $user = User::find($id);
                    $user->name = $request->get('name');
                   
                    $user->save();

                    $data = doctor::updateOrCreate(
                        ['user_id' => auth()->user()->id],
                        ['user_id'=>auth()->user()->id, 'education' =>$request->get('education'),'post' => $request->get('designation'), 'description' =>$request->get('description')]    
                    );
                }
          
            if($data){
                return redirect()->route('doctor.bio')->with('data', $data)->with(['message'=> 'Doctor Bio Successfully Updated!!']);
                }
                else{
                    return redirect()->route('doctor.bio')->with('data', $data)->with(['error'=> 'Error While Updating Doctor Bio!!']);
                }
        
        
       
    }

    public function storeimage(Request $request)
    {
        

            if($request->hasFile('file')){

                if (auth()->user()->doctors->profilepic){
                    Storage::delete('/public/images/'.auth()->user()->doctors->profilepic);
                }
                $filenamewithExt = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('file')->move('storage/images/',$fileNameToStore);;
                }else{
                    $fileNameToStore = 'nofile.pdf';
                }
                $data = doctor::updateOrCreate(
                    ['user_id' => auth()->user()->id],
                    ['profilepic' =>$fileNameToStore]    
                    );
        
            if($data){
                return redirect()->route('doctor.bio')->with('data', $data)->with(['message'=> 'Profile Picture Successfully Updated!!']);
                }
                else{
                    return redirect()->route('doctor.bio')->with('data', $data)->with(['error'=> 'Error While Updating Picture!!']);
                }
           
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
