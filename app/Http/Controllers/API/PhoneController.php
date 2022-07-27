<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Phone;

use Illuminate\Http\Request;
use App\Http\Resources\PhoneCollection;
use App\Http\Resources\PhoneResource;


class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $phone=Phone::select('user_id','phone')->get();
        // return $phone;
        return new PhoneCollection(Phone::where('user_id',auth()->id())->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "Welcome Stor";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //  $phone=Phone::where('id',$id)->select('user_id','phone')->first();
        //  return $phone;
         return new PhoneResource(Phone::find($id));
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
        $phone=Phone::find($id);
        $phone->phone=$request->phone;
        return new PhoneResource($phone);

        // return "wlecome ubdate ";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Phone::find($id)->delete();
        return 'Welcome Delete';
    }
}
