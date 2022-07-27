<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PhoneRequest;
use App\Http\Requests\PhoneRequestForEdit;
use App\Models\User;
use Auth;


use App\Models\Phone;
class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $phone=Phone::all();
       // $phone = User::find(auth()->id())->phones;
        //dd($phone);
       return view('phones.index',['phones'=> $phone]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
       //validation 

      
       //$phone = Phone::create($request->all());
       if(Auth::user()->cannot('create',Phone::class))
       abort(403);

      //Store PhoneNumber in DB
       $phone=new Phone();
       $phone->user_id =auth()->id();
       $phone->phone =$request->phone;
       if($phone->save())
       session()->flash('status', 'Stor was successful!');

       return redirect()->route ('phones.index');
       


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
    public function edit($id)
    {
        $phone=Phone::find($id);

        if(Auth::user()->cannot('update',$phone))
        abort(403);
        return view('phones.edit',['phone'=> $phone]);
        
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequestForEdit $request, $id)
    {   
        $phone=Phone::find($id);
        //$this->authorize('update',$phone);
        if(Auth::user()->cannot('update',$phone))
        abort(403);
        //ubdate data in DB
        
        $phone->phone=$request->phone;
        if($phone->save())
        return redirect()->route ('phones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $phone=Phone::find($id);

        if(Auth::user()->cannot('delete',$phone))
        abort(403);
        Phone::find($id)->delete();
        return redirect()->route ('phones.index');
}
}
