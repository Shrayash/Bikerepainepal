<?php


namespace App\Http\Controllers;
use App\User;
use App\videos;
use App\Inventory;
use App\category;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\StatusChange;
use App\Notifications\RolesChange;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Validator;
use App\customer_vehicles;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
// use Cviebrock\EloquentSluggable\Services\SlugService;



class InventoryController extends Controller
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
        $inventory = Inventory::all();
        $category = category::all();
        $item_code =  Helper::IDGenerator(new Inventory, 'item_code', 4, 'BRN');
        return view('inventory.create')->with('inventory',$inventory)->with('item_code',$item_code)->with('category',$category);
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
    { $values = array(
            'item_name' => 'required|unique:inventories,item_name',
            'image' => 'required|unique:inventories,file'
          );
          $error = Validator::make($request->all(), $values);
          if($error->fails())
          {
            // return Redirect::to('register')->withErrors($error);
          return response()->json([
            'error'  => $error->errors()->all()
          ]);
          }
        $inventory = new Inventory();
        $inventory->category_id =  $request->get('category');
        $inventory->unit = $request->get('unit');
        $inventory->item_name = $request->get('item_name');
        $inventory->slug = Str::slug($inventory->item_name);
        $inventory->item_code = $request->get('item_code');
        $inventory->description = $request->get('description');
        if($request->hasFile('image')){
   
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->move('storage/images/',$fileNameToStore);
            }else{
                $fileNameToStore = 'nofile.pdf';
            }
        $inventory->file = asset('storage/images/'. $fileNameToStore);
        // dd( $inventory->file);
        $inventory->price = $request->get('price');
        $inventory->save();
        return redirect()->route('inventory.index')->with(['message'=> 'Item Added Sucessfully! View table below for details.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        $inventory = Inventory::all();
        $category = category::all();
        // foreach ( $category as $p) {
        //     dd($p->id);
        //     }
       

        return view('inventory.show',['inventory'=>$inventory,'category'=>compact('category')]);
    }

    public function search_cat(Request $request)
    {
        
        // $category_search = Inventory::findOrfail($request->get('category'));
        // $inventory = Inventory::where('category_id',$request->get('category'))->get();
        // $category = category::all();
     
        $slug =  $request->get('category');
        return redirect()->route('inventory.category_items',$slug);


    }

    public function category_items($slug)
    {
       
        $category_id = category::where('slug',$slug)->select('id')->get();
        $inventory = Inventory::where('category_id',$category_id[0]->id)->get();
        $category = category::all();

        return view('inventory.category_items',['inventory'=>$inventory,'category'=>compact('category'),'category_id'=>$category_id[0]->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::findOrfail($id);
        $category = category::all();
        // foreach ( $category as $p) {
        //     dd($p->id);
        //     }
       

        return view('inventory.edit',['inventory'=>$inventory,'id'=>$id,'category'=>compact('category')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrfail($id);
        $inventory->category_id =  $request->get('category');
        $inventory->unit = $request->get('unit');
        $inventory->item_code = $request->get('item_code');
        $inventory->item_name = $request->get('item_name');
        $inventory->description = $request->get('description');
        if ($inventory->file){
                       
            Storage::delete('/storage/pdfs/'.$inventory->file);
        }
        if($request->hasFile('image')){
            $destination = 
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->move('storage/images/',$fileNameToStore);
            }else{
                $fileNameToStore = 'nofile.pdf';
            }
        $inventory->file = $fileNameToStore;
        // dd( $inventory->file);
        $inventory->price = $request->get('price');
        $inventory->save();
        return redirect()->route('inventory.index')->with(['message'=> 'Item Updated Sucessfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
                if($inventory){
                    return redirect()->route('inventory.index')->with(['message'=> 'Item Removed Sucessfully']);
                    }
                    else{
                        return redirect()->route('inventory.index')->with(['error'=> 'Error while deleting!!']);
                    }
    }
}
