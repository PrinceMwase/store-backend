<?php

namespace App\Http\Controllers\sanctum;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product;
use App\Product as AppProduct;
use App\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Product::collection(AppProduct::paginate(10) );
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
        //
        
        $this->validation($request);

        // find related models        
        $category = Category::find( $request->category );
        $store = Store::find( $request->store );

        
        // authorize action
        $this->authorize('create', $store);
        
        // create model
        $product = AppProduct::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        // associate model with related models
        $product->store()->associate( $store );
        $product->category()->associate( $category );

        $product->save();

        return response('Created', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find the product
        $product = AppProduct::findOrFail($id);

        
        // return the resource responce
        
        return new Product($product);
    }

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
    public function update(Request $request, $id)
    {
        //

        $this->validation($request);

        // find related models        
        $category = Category::find( $request->category );
        $store = Store::find( $request->store );

        

        // Find the model
        $product = AppProduct::findOrFail($id);

        // authorize action
        $this->authorize('update', $product);

        // update fields
        $product->name = $request->name;
        $product->price = $request->price;

        // associate model with related models
        $product->store()->associate( $store );
        $product->category()->associate( $category );


        $product->save();

        return response('updated', 200);
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
          // Find the model
          // Find the model
        $product = AppProduct::findOrFail($id);
        $this->authorize('update', $product);

        $product->photo->delete();
        $product->delete();

        return response('Deleted', 200);
    }

    /**
     * Product validation request rules
     * 
     * @param \Illuminate\Http\Request  $request
     */

     public function validation($request){


        $request->validate([
            'name' => "required|string",
            'price' => 'required|digits_between:1,1,000,000',
            'category' => 'required|integer',
            'store' => 'required|integer',
            
        ]);
     }
}
