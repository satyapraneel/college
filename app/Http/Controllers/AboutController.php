<?php

namespace App\Http\Controllers;

use App\Repositories\Address\IAddressRepository;
use App\Repositories\College\ICollegeRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AboutController extends Controller
{
    
    public function index()
    {
            //return the view
        //dd means dump and die
            return view('about.index');
    }

    

}
