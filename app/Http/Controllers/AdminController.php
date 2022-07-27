<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use App\Models\Traducteur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $langues = Langue::all();
        $traducteurs = Traducteur::all();
        return view('admin.index', ['traducteurs'=> $traducteurs, 'langues'=>$langues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create', ['langues'=>Langue::all()]);

    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required|min:2|max:25',
            'nom'=> 'required|min:2|max:35',
            'tel'=>'required|min:14|max:18'
        ]);
        $newImage = $request->file('image');
        if (isset($newImage) && !empty($newImage)){
            $imageName = time().'.'.$newImage->extension();
            $newImage->move(public_path('images/trad/'),$imageName);
        }
        Traducteur::create([
            'prenom'=>$request->input('prenom'),
            'nom'=>$request->input('nom'),
            'image'=>$imageName,
            'tel'=>$request->input('tel'),
            'email'=>$request->input('email'),
            'id_langue'=>$request->input('id_langue')
        ]);
            return redirect()  
                            ->route('admin.index')
                            ->with('success', 'Cette fiche a bien été ajoutée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $langues = Langue::all();
        // $traducteurs = Traducteur::all();

        // return view('admin.show',['langues'=> $langues, 'traducteurs'=>$traducteurs]);
    
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $langues = Langue::all();
        $traducteur = Traducteur::find($id);
        return view('admin.edit', ['traducteur'=> $traducteur, 'langues'=>$langues]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'prenom' => 'required|min:2|max:25',
            'nom'=> 'required|min:2|max:35',
            'tel'=>'required|min:14|max:18'
        ]);
        $newImage = $request->file('image');
        if (isset($newImage) && !empty($newImage)){
            $imageName = time().'.'.$newImage->extension();
            $newImage->move(public_path('images/trad/'),$imageName);
        }
        $traducteur = Traducteur::find($id);
        $traducteur->prenom = $request->input('prenom');
        $traducteur->nom = $request->input('nom');
        if (isset($newImage) && !empty($newImage)){
            $traducteur->image = $imageName;
        }
        $traducteur->tel = $request->input('tel');
        $traducteur->email = $request->input('email');
        $traducteur->id_langue = $request->input('id_langue');
        
        $traducteur->save();
        return redirect()  
                            ->route('admin.index')
                            ->with('success', 'La fiche a été modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $traducteur = Traducteur::find($id);
        if (isset($traducteur->image) && !empty($traducteur->image)){
            unlink(public_path('images/trad/').'/'.$traducteur->image);
        }
        $traducteur->delete();

        return redirect()  
                            ->route('admin.index')
                            ->with('success', 'Cette fiche a bien été supprimée.');
    }

}
