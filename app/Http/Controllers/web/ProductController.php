<?php

namespace App\Http\Controllers\web;

use App\Category;
use App\Description;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Product;
use App\Store;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{

    public function __construct()
    {
        
        $this->authorizeResource(Product::class, 'product');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $stores = User::find ( auth()->user()->id )->seller->store->modelKeys();

        $products = Product::whereIntegerInRaw('store_id' ,  $stores)->paginate( 10 );

        return view('web.dashboard.seller.product.index')
            ->with('products', $products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::all();

        $stores =  Store::owned()->get();

        return view('web.dashboard.seller.product.create')
            ->with('categories', $categories)
            ->with('stores', $stores)
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //validating first
            $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'category' => 'required|integer',
                'store' => 'required|integer',
                'photo' => 'required|image',
                'price' => 'required|'
            ]);


        //save THe Image to disk and create the model  
        $photo = PhotoController::createPhoto( $request );
        

        //Create a new Product  
            $product = Product::create([
                'name' => $request->name,
                'price' => (int) $request->price,
            ]);
        
        // check if the uploaded product has been uploaded to an owned store
            StoreController::checkStore( $request->store );
        
        // create related Models
            $description = new Description(['description' => $request->description]);


        // touch relationships
            $product->photo()->associate( $photo );
            $product->description()->save( $description );
            $product->store_id = (int)$request->store;
            $product->category_id = (int)$request->category;
            
        //save Product Model 
            $product->save();


        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //

       
        
        return view('web.dashboard.seller.product.show')
            ->with('product', $product);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
       

        $categories = Category::all();

        $stores =  Store::owned()->get();


        return view('web.dashboard.seller.product.edit')
            ->with('categories', $categories)
            ->with('stores', $stores)
            ->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
          //validating first
          $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|integer',
            'store' => 'required|integer',
        ]);

        // check if the uploaded product has been uploaded to an owned store
        StoreController::checkStore( $request->store );

        $product->name = $request->name;
        $product->description->description = $request->description ;
        $product->description->save();
        $product->store_id = (int)$request->store;
        $product->category_id = (int)$request->category;

        $product->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();

        return redirect()->route('products.index');
    }
}
