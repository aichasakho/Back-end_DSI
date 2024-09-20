<?php

namespace App\Http\Controllers;

use App\Http\Requests\addAppartementRequest;
use App\Models\Appartement;
use Illuminate\Http\Request;
use App\Models\BienImmobilier;

class AppartementController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $appartements = Appartement::with('bienImmobilier')
      ->paginate(10);
    return view('admin.appartement.index', compact('appartements'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $immeubles = BienImmobilier::where('type_bien_id', 1)
      ->pluck('nom_immeuble', 'id');

    return view('admin.appartement.store', compact('immeubles'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(addAppartementRequest $request)
  {
    Appartement::create($request->validated());
    return redirect()->route('appartement.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Appartement $appartement)
  {
    $appartement->load('bienImmobilier');
    return view('admin.appartement.show', compact('appartement'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Appartement $appartement)
  {
    $immeubles = BienImmobilier::where('type_bien_id', 1)
      ->pluck('nom_immeuble', 'id');
    return view('admin.appartement.edit', compact('appartement', 'immeubles'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(addAppartementRequest $request, Appartement $appartement)
  {
    $appartement->update($request->validated());
    return redirect()->route('appartement.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Appartement $appartement)
  {
    $appartement->delete();
    return redirect()->route('appartement.index');
  }
}
