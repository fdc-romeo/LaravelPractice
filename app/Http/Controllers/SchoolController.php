<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;


class SchoolController extends Controller
{

    public function __construct(){
        $this->database = new School;  
       
    }


    public function index() {
     $data_ret = $this->database->orderBy('id')->get();
     return view('/School/index', 
          [
              'data' => $data_ret,
          ]); 
    }

    public function store(Request $request) {
        //
         $school_name   = $request->school_name;
         $school_address = $request->school_address;

         if (!empty($school_name) && !empty($school_address) ) {
       
             $this->database->school_name = $school_name;
             $this->database->school_address = $school_address;
             $this->database->save();
        
          return "Sucess";
         } else {   
            return "false";
         }
    }
 
    public function delete(Request $request) {

        $id =   $request->id;

        if (!empty($id)) {
             $data = $this->database->find($id);
             $data->delete();
             return "Sucess";
        } else {
            return "false";
        }
    }
 
    public function edit(Request $request) {
     $id =   $request->id;
     // // return $id;
     $data_ret = $this->database->find($id);
     return $data_ret;
    }

    public function update(Request $request)
    {
        //
         $id =   $request->id;
         $school_name   = $request->school_name;
         $school_address = $request->school_address;

         if (!empty($id) ) {

             $update = [
                'school_name' => $school_name,
                'school_address' => $school_address,
             ];

             $data = $this->database
                     ->where('id', $id)
                     ->update($update);
            return "Sucess";
         } else {
            return "false";
         }
    }


}
