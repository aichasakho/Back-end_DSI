<?php

namespace App\Http\Controllers;

use App\Http\Requests\addProprioRequest;
use App\Http\Requests\UpdateProprioRequest;
use App\Models\Proprietaire;
use App\Models\User;
use Illuminate\Http\Request;

class ProprioController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiche une liste de tous les propriétaires
     */
    public function index()
    {


        $userAll=Proprietaire::paginate(10);

        return view('admin.proprietaires.index',[
            'userAll'=>$userAll
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Enregistre un nouveau propriétaire dans la base de données
     */
    public function store(addProprioRequest $request)
    {


        $user= new Proprietaire();
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->tel=$request->tel;
        $user->adresse=$request->adresse ? :'';

        if($request->hasFile('profile')){
            $user->profile=$request->file('profile')->store('user','public');
        }
        $user->save();

        flash()->info('Propriétaire ajouté avec success !');

        return back();

    }

    /**
     * Display the specified resource.
     * Affiche les détails d'un propriétaire spécifique
     */
    public function show(string $id)
    {
        $user=Proprietaire::find($id);
        if(!$user){
            flash()->error('Veuillez actualiser la page');
            return back();
        }

        return view('admin.proprietaires.edit',[
            'user'=>$user
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Met à jour les informations d'un propriétaire existant
     */
    public function update(UpdateProprioRequest $request)
    {
        $user= Proprietaire::find($request->id);
        if(!$user){
            flash()->info('Propriétaire introuvable !');

            return back();

        }

        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->tel=$request->tel;
        $user->adresse=$request->adresse ? :'';

        if($request->hasFile('profile')){
            $user->profile=$request->file('profile')->store('user','public');
        }
        $user->save();

        flash()->success('Propriétaire ajouté avec success !');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
