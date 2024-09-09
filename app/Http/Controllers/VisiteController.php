<?php

namespace App\Http\Controllers;

use App\Models\Visite;
use Illuminate\Http\Request;

class VisiteController extends Controller
{

// L' affichage du liste des visites
    public function index(){
        $visiteAll=Visite::with('client','bien_immobilier')-> paginate(10);
        return view('admin.visite.index',[
            'visiteAll'=>$visiteAll
        ]);
    }

// modification d'une visite existante

    public function edit($id){
        $visite=Visite::find($id);
        if(!$visite){
            toastr()->error('Attention donnée non existante');
            return back();
        }
        return view("admin.visite.valide",[
            'visite'=>$visite
        ]);
    }

//Cette méthode valide une visite
    public function valideVisite(Request $request){
        $visite=Visite::find($request->id);
        if(!$visite){
            toastr()->error('Attention donnée non existante');
            return back();
        }

        $visite->status="Valider";
        $visite->date_visite=$request->date_visite;
        $visite->touch();
        toastr()->success('Visites valider avec succes !');
        return redirect()->route('demande.visite');
    }



}
