<?php

namespace App\Http\Controllers\sanctum;

use App\Description;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Store;
use App\User;
use Illuminate\Http\Request;


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

        return Store::select('name')->addSelect(['description' => Description::select('description')
            ->whereColumn('describable_id', 'stores.id')
            ->where('describable_type', Store::class)
            ->where('status', 'active')
            ->limit(1)
            ])->addSelect(['owner' => User::select('name')
            ->whereColumn('id', 'stores.user_id')
            ->limit(1)
            ])->addSelect(['photo' => Photo::select('photo')
            ->whereColumn('id', 'stores.photo_id')
            ->limit(1)
            ])->get();



        return Store::class;
        $store = Store::all();

        return $store;

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
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
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
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
