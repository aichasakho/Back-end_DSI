<?php

namespace App\Http\Controllers;

use App\Http\Requests\addAnnonceRequest;
use App\Models\Annonce;
use App\Models\BienImmobilier;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonce= Annonce::with('bien_immobilier')-> paginate(10);
        return view('admin.annonce.index',[
            'annonce'=>$annonce]);
    }


  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $annonces = BienImmobilier::where('type_bien_id', 1)
      ->pluck('nom_immeuble', 'id');

    return view('admin.annonce.store', compact('annonces'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(addAnnonceRequest $request)
  {
    Annonce::create($request->validated());
    return redirect()->route('annonce.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Annonce $annonce)
  {
    $annonce->load('bienImmobilier');
    return view('admin.annonce.show', compact('annonce'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Annonce $annonce)
  {
    $immeubles = BienImmobilier::where('type_bien_id', 1)
      ->pluck('nom_immeuble', 'id');
    return view('admin.annonce.edit', compact('annonce', 'immeubles'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Annonce $annonce)
  {
    $annonce->update($request->validated());
    return redirect()->route('annonce.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Annonce $annonce)
  {
    $annonce->delete();
    return redirect()->route('annonce.index');
  }

}
