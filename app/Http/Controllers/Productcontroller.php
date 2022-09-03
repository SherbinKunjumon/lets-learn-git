<?php

namespace App\Http\Controllers;
use Illuminate\Database\Query\Builder;
use App\Models\product;
use App\Models\Category;
use App\Models\User;
use App\Models\Colour;
use App\Models\feature;
use App\Models\productfeature;
use App\Models\productimage;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
 use DataTables;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Respons
     */
    public function index()
    {//$product = product::all();
        
     //$product = product::Join('categories', 'categories.id', '=', 'products.category_id')
       //  ->join('colours', 'colours.id', '=', 'products.colour')
       
      
        // ->get(['products.id',]);
                      
                      try{//$product=Product::all();
                       // $product =product:: lists('itemname');
                       //$product = Product::select('itemname', 'description')->get();
                       /* $product = Product::distinct()->get();
                       $product =Product::select('itemname as descripion')->get();
                       $query =Product::select('itemname');
                       $product = $query->addSelect('description')->get();


                     dd($product);*/
                      $product = Product::select('products.id','products.itemname','products.amount' ,
                      'categories.categoryname', 'colours.colourname','products.description','products.subcategory','subcategories.subcategoryname',
                      'products.filename')
                      ->join('categories', 'products.category', '=', 'categories.id')
                      ->join('colours', 'products.colour', '=', 'colours.id')
                      ->join('subcategories','products.subcategory','=','subcategories.id')
                      ->get(); // or first() 
                   //dd($product);
                
        return view('productlist')->with('product',$product);
                      
                    } catch (\Throwable $th) { dd($th);
                       
                        return redirect()->back();//->with('error_message', 'Database storing chain break !!!');
                    }
    }

    
    
    public function create(Request $request)
    { 
        $category=Category::all();
      
        $colour=Colour::all();
        $feature=feature::all();
        //$productfeature=productfeature::all();
        return view('productentry')->with('category',$category)
         ->with('colour',$colour)->with('feature',$feature);//->with('productfeature',$productfeature);
 ;
  
        //
    }
 public function subcategoryselect(Request $request){
    $subcategory=Subcategory::where('categoryid','=',$request->id)->get();
    return response()->json($subcategory);
}
 



    public function store(Request $request)
    { 
     try{


        request()->validate([
            'itemname' => 'required',
            'description' => 'required',
        ]);
         request()->validate([
            'image' => 'required',
        ]);
        
 //$productimage = $request->file('productimage');
//$extension = $productimage->getClientOriginalExtension();
        $image = Storage::disk('public')->put('images',$request->productimage);
               $pro=new product();
        $pro->itemname=$request->itemname;
        $pro->amount=$request->amount;                                                                                                                                                                                                                                                                                 
        $pro->category=$request->category;
        $pro->subcategory=$request->subcategory;
        $pro->colour=$request->colour;
         $pro->description=$request->description;
         
         $pro->filename =  $image ;
     
     
        // $pro->features=$request->features;
         $pro->save();
         if($request->hasfile('image')) {

            foreach ($request->file('image') as $key=>$imagefile) {
               
                //$pimage = $request->file('imagefile');
               // $extension = $pimage->getClientOriginalExtension();
                $images= Storage::disk('public')->put('uploads',$imagefile);
                $productimage = new Productimage();
                $productimage ->productid = $pro->id;
                $productimage->productimage =  $images;
               $productimage->save();
            }}
         $features=feature::all();
//dd($request);
         foreach ($features as $key => $feature) {
                          $productfeature = new Productfeature();
                 $productfeature ->productid = $pro->id;
                $productfeature ->featureid =  $feature->id;
                // dd($request->input(feature[$feature->id]);
                     $productfeature ->featurevalue = isset($request->features[$feature->id]) ? "1" : "0";
                     $productfeature->save();//name from view is not that to be taken ,$request->features[$feature->id] this is 
                    // to be considered ,feature in that is id isset or unset,according to tht featuevalue saved as 1 or 0
}
     }
     catch (\Throwable $th) { dd($th);
                       
        return redirect()->back();//->with('error_message', 'Database storing chain break !!!');
    }
    }
public function storeimage(Request $request )
{ request()->validate([
    'image' => 'required',
]);

 try{
    
       if($request->hasfile('image')) {

foreach ($request->file('image') as $key=>$imagefile) {
   
    //$pimage = $request->file('imagefile');
   // $extension = $pimage->getClientOriginalExtension();
    $images= Storage::disk('public')->put('uploads',$imagefile);

}
} 
 }

catch(\Throwable $th) {
    dd($th);
   }


  }

  public function subcategory()
  {
    $category=Category::all();
    return view('subcategory')->with('category',$category); }



  public function subcategorystore(Request $request)
  {
    $subcategory = new subcategory();
    $subcategory->categoryid=$request->category;
    //$subcategory ->categoryid = $category->id;
    $subcategory->subcategoryname= $request->subcategory;
   $subcategory->save();
//
  }

/* public function show(product $product,$id)
    {
        $product=Product::find($id);
    return view ('PRODUCTedit')->with('product',$product);
    //
    }
 */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //



        try{ 

            $colour=Colour::all();
            $category=Category::all();
            $feature=Feature::all();
         $product=Product::find($id);
         $productfeature=Productfeature::where('productid','=',$id)->get();
       //dd($product);
       $productfeature = Productfeature::select('productfeatures.featurevalue' ,'productfeatures.featureid','productfeatures.productid','features.featurename')
       ->join('features', 'productfeatures.featureid', '=', 'features.id')
       ->where( 'productfeatures.productid', '=', $id)
       ->get();
          
                return view ('edit')->with('colour',$colour)
            ->with('category',$category)->with('product',$product)
            ->with('feature',$feature)->with('productfeature',$productfeature);
        }
            catch(\Throwable $th) {
                    dd($th);
                    return redirect()->back()->with('error_message', 'Database storing chain break !!!');
                }
    }

    /**
     * Update the spec  ified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)    {
        // dd( $fri);
        try{
        $pro=Product::find($id);
        $pro->itemname=$request->itemname;
        $pro->category=$request->category;
        $pro->description=$request->description;
        $pro->colour=$request->colour;
        $pro->amount=$request->amount;
        //$pro->features=$request->features;
        if($request->has('productimage'))
        {

  //delete image
       Storage::delete($pro->filename);
       //store image to folder
        $image= Storage::disk('public')->put('images',$request->productimage);
  //store path to db
        $pro->filename =$image;
       }
        $pro->save();
        DB::delete('delete from Productfeatures where productid = ?',[$id]);
        $features=feature::all();
        //dd($request);
                 foreach ($features as $key => $feature) {
                                  $productfeature = new Productfeature();
                         $productfeature ->productid = $pro->id;
                        $productfeature ->featureid =  $feature->id;
                        // dd($request->input(feature[$feature->id]);
                        $productfeature ->featurevalue = isset($request->features[$feature->id]) ? "1" : "0";
                     
                            // $productfeature ->featurevalue = isset($request->features[$feature->id]) ? "1" : "0";
                             
                             $productfeature->save();
        }   }

//image is required

        catch(\Throwable $th) {
                dd($th);
                return redirect()->back()->with('error_message', 'Database storing chain break !!!');
            }
        return redirect('products');
     }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        DB::table('productfeatures')->where('id', $id)->delete();
        
        return redirect('products');
    
    }
    public function download(Request $request){
        return Storage::download($request->path);
    }

public function getproducts(Request $request)
{
    if ($request->ajax()) {
        $data = Product::select('*');
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
 
                       $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    
    return view('products');

}

 public function login(Request $request )
    {
        
         $user=User::where('email','=',$request->email)
         ->where('password','=',$request->password)->get();
        //dd($user[0]["email"]);
//$request->session()->put('email',$user[0]["email"]);
                
         if($user[0]["email"]!=null)
         {$request->session()->put('email',$user[0]["email"]);
         
        
    return view('templayout');
         }}
    public function logincreate( )
    {
        
         
         return view('login');
       //
        
    //
    }
 
 }