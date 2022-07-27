<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail (){
        $contenu = [
            'titre'=>'Envoi de mail',
            'message'=>'Contenu du mail'
        ];
        Mail::to('as.dechampfleur@gmail.com')
            ->send(new \App\Mail\Contact($contenu));
        return "Email envoyé";
    }

    public function sendContact(Request $request){
        // dd($request->name);
        $contenu = [
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ];
        Mail::to(env('MAIL_TO'))
            ->send(new \App\Mail\Contact($contenu));
        return view('emails.confirmation');
    }
}
