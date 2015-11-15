<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getContact', 'confirm']]);
    }
    
    public function index()
    {
        return view('index');
    }
    
    public function getContact(){
        
    }
    
    

}
