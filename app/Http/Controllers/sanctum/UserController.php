<?php

namespace App\Http\Controllers\sanctum;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpseclib\Crypt\RC2;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        
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
    public function show(Request $request)
    {
        //
        return $request->user();
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
    public function update(Request $request, $id, $collumn)
    {
        //validate request

        $user = User::find($id);

        $this->authorize('update' , $user );

        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|number',
            'email' => 'required|email:unique',
            'phone_number' => 'required|number',
            'photo' => 'required|image',
            'password' => 'required|password:sanctum'


        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->outstation_id = $request->outstation;
        $user->password = Hash::make( $request->password );

        $user->save();

        session()->flash('status', 'Updated user details successfuly');

        return redirect()->back();
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
}
