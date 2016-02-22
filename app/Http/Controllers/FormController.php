<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function sendData(Request $request) {
        
        //Get all the data and store it inside Store Variable
        $data = Input::all();

        //Validation rules
        $rules = array (
            'product_name' => 'required|alpha',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric'
        );

        //Validate data
        $validator = Validator::make ($data, $rules);

        //If everything is correct than run passes.
        if ($validator -> passes())
        {

            if(!empty($request))
            {
                //Save data in the database
                $saveData = new \App\Stock();
                $saveData->product_name = $request->input('product_name');
                $saveData->quantity = $request->input('quantity');
                $saveData->price = $request->input('price');
                $saveData->save();
            }
            
            return response()->json($data)->setCallback(Input::get('callback'));
        }
        else
        {
        //return contact form with errors
            return view('home/pages/home')->withErrors($validator);
        }
    }
}