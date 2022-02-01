<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
        return view('web.dashboard.seller.photo.edit')
            ->with('photo', $photo);
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
        $paths = PhotoController::updateToDisk($request, $photo);

        $photo->thumbnail = $paths['thumb'];
        $photo->photo = $paths['path'];
        $photo->save();

        return redirect()->route('photos.edit', $photo->id);

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
    }

    /**
     * Save A photo to disk and returns the path
     */
    static function toDisk( $request ){

        $request->validate([
            'photo' => 'required|image'
        ]);

        // save image file and copy file name 
            $path = $request->file('photo')->store( 'public/'.$request['category'] );
            $thumb = explode('public/'.$request['category'].'/', $path)[1];


        
        // create a thumbnail and save in separate folder
            Image::configure(array('driver' => 'gd'));
            Image::make(storage_path('app/'.$path))
            ->resize(300,300)
            ->save(public_path('storage\\thumbs\\'.$thumb));
    
        return array( 'path' => explode(  'public/', $path )[1] , 'thumb' => 'thumbs/'.$thumb );

    }

    static function updateToDisk( $request, $photo ){

        PhotoController::deleteFromDisk($photo);
        return PhotoController::toDisk($request);
    }

    static function createPhoto( $request ){

        $paths = PhotoController::toDisk( $request );
        
        $photo =  Photo::create(['photo' =>  $paths['path'] , 'thumbnail' => $paths['thumb'] ]);
        return $photo;
    }

    /**
     * Delete Photo From Disk
     */

    static function deleteFromDisk( $photo ){
        Storage::delete( public_path('storage/'.$photo->photo) );
        Storage::delete( public_path('storage/'.$photo->thumb) );

    }

}
