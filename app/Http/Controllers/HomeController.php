<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HomeController extends Controller
{
    public function index()
    {
        //get data from the database
        $products = \App\Stock::orderBy('created_at')->get();
        
        return view(
            'home/pages/home',
            array(
                'products' => $products
            )
        );
    }
}