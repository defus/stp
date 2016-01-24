<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ContactUsRequest;
use App\Http\Controllers\Controller;
use Mail;

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
    
    public function contactUs(ContactUsRequest $request){
        $message = [
            'name' => $request->nom,
            'email' => $request->email,
            'sujet' => $request->sujet,
            'message' => $request->message,
        ];
        
        Mail::send('emails.contact_us', ['data' => $message], function ($m) use ($message) {
            $m->to("defolandry@yahoo.fr", "Landry DEFO")
                ->to('m.arahou@gmail.com', "M'hamed Arahou")
                ->to('hassanaslimani@gmail.com', "Hassan Aslimani")
                ->subject('Message envoyé par le formulaire de contact de TransPlateforme.Com');
        });
        
        return ["resultat" => "ok"];
    }
    
    

}
