<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use Illuminate\Http\Request;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexl()
    {
        $langues = Langue::all();
        return view('admin.lang', ['langues'=>$langues]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createl()
    {
        return view('admin.createl', ['langues'=>Langue::all()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storel(Request $request)
    {
        $newImage = $request->file('image');
        if (isset($newImage) && !empty($newImage)){
            $imageName = time().'.'.$newImage->extension();
            $newImage->move(public_path('images/'),$imageName);
        }
        Langue::create([
            'libelle'=>$request->input('libelle'),
            'image'=>$imageName,
        ]);
            return redirect()  
                            ->route('admin.lang')
                            ->with('success', 'Cette langue a bien été ajoutée.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function editl($id)
    {
        $langue = Langue::find($id);
        return view('admin.editl', ['langue'=>$langue]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updatel(Request $request, $id)
    {

        $newImage = $request->file('image');
        if (isset($newImage) && !empty($newImage)){
            $imageName = time().'.'.$newImage->extension();
            $newImage->move(public_path('images/'),$imageName);
        }
        $langue = Langue::find($id);
        $langue->libelle = $request->input('libelle');
        if (isset($newImage) && !empty($newImage)){
            $langue->image = $imageName;
        }
        
        $langue->save();
        return redirect()  
                            ->route('admin.lang')
                            ->with('success', 'La langue a été modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroyl($id)
    {
        $langue = Langue::find($id);
        if (isset($langue->image) && !empty($langue->image)){
            unlink(public_path('images/').'/'.$langue->image);
        }
        $langue->delete();

        return redirect()  
                            ->route('admin.lang')
                            ->with('success', 'Cette langue a bien été supprimée.');
    }
}
