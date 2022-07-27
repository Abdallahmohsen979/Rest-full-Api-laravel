<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
   
    public function index()
    {
       return view('contacts.home');
    }

  
    public function create()
    {
        return view('contacts.createcontact');
    }

   
    

   
    public function show($id)
    {   
        //echo $id;
        return view('contacts.showcontact');
       
    }

   
    public function update($id)
    {
        return view('contacts.updatecontact');
    }

   
   

    public function destroy($id)
    {
        return view('contacts.deletecontact');
    }
}
