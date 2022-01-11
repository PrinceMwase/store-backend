<?php

namespace App\Http\Controllers\sanctum;

use App\Description;
use App\Http\Controllers\Controller;
use App\Http\Resources\Store as ResourcesStore;
use App\Photo;
use App\Store;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ResourcesStore::collection( Store::paginate(5) );

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
        
        // authorize action
        $this->authorize('create', Store::class);

        $store = Store::create([
            'name' => $request->name
        ]);

        // store photo and create link
        $path = $request->file('photo')->store('public/store');

        $thumb = explode('public/store', $path)[1];

        // create a thumbnail and save in separate folder
        Image::configure(array('driver' => 'gd'));

        Image::make(storage_path('app/'.$path))
        ->resize(300,300)
        ->save(storage_path('app/public/thumbs/'.$thumb));

        $photo = Photo::create( ['photo' => $path , 'thumbnail' => 'public/thumbs/'.$thumb ]);
        
        

        // associate model with relationships
        $user = User::findOrFail( auth()->user()->id );

        $store->user()->associate( $user );

        $store->description()->save( new Description( [ 'description' => $request->description ] ) );

        $store->photo()->associate( $photo );

        $store->save();

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
        //
        // find the product
        $store = Store::active()->where('id', $id)->firstOrFail();

        // return the product
        return new ResourcesStore ( $store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $int
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=>'required|string',
        ]);

        $store = Store::findOrFail( $id );

         // authorize action
        $this->authorize('update', $store);

        $store->name = $request->name;

        $store->save();

        return response('updated', 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $store = Store::findOrFail( $id );
        // authorize action

        $this->authorize('delete', $store);

        $store->status = 'inactive';

        $store->save();

        return response('Deleted', 200);
        
    }

    /**
     * Store validation request rules
     * 
     * @param \Illuminate\Http\Request  $request
     */

    public function validation($request){


        $request->validate([
            'name' => "required|string|unique:stores",
            'photo' => "required|image",
            'description' => 'required|string'
        ]);
     }
}
