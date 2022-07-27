<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use App\Models\Traducteur;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index(){
        return view('index');
    }

    public function trad()
    {
        $langues = Langue::all();
        $traducteurs = Traducteur::all();

        return view('traducteurs',['langues'=> $langues, 'traducteurs'=>$traducteurs]);
    }

  
}

