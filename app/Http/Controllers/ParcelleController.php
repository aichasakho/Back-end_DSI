<?php

namespace App\Http\Controllers;

use App\Http\Requests\addParcelleRequest;
use App\Models\BienImmobilier;
use App\Models\Parcelle;
use Illuminate\Http\Request;

class ParcelleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $parcelles = Parcelle::with('bienImmobilier')
      ->paginate(10);
    return view('admin.parcelle.index', compact('parcelles'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $terrains = BienImmobilier::where('type_bien_id', 4)->get();

    return view('admin.parcelle.store', compact('terrains'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(addParcelleRequest $request)
  {
    Parcelle::create($request->validated());
    return redirect()->route('parcelle.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Parcelle $parcelle)
  {
    $parcelle->load('bienImmobilier');
    return view('admin.parcelle.show', compact('parcelle'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Parcelle $parcelle)
  {
    $terrains = BienImmobilier::with('proprietaire')
      ->where('type_bien_id', 4)->get();
    return view('admin.parcelle.edit', compact('parcelle', 'terrains'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(addParcelleRequest $request, Parcelle $parcelle)
  {
    $parcelle->update($request->validated());
    return redirect()->route('parcelle.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Parcelle $parcelle)
  {
    $parcelle->delete();
    return redirect()->route('parcelle.index');
  }
}
