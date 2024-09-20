<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\BienImmobilier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BienImmobilierController extends Controller
{

    public function index()
    {
        $bienImmobilier = BienImmobilier::with('type_bien', 'localite', 'proprietaire')->get();
        return response()->json($bienImmobilier);
    }

    public function show(string $id)
    {
        $bienImmobilier = BienImmobilier::findOrFail($id)
            ->load('type_bien', 'localite', 'proprietaire');
        return response()->json($bienImmobilier);
    }
    /**
     * Enregistrer un bien dans la base de donnée
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'superficie' => 'required|float',
            'nbr_piece' => 'required|float',
            'prix_achat' => 'required|float',
            'nom_immeuble' => 'required|string',
            'nbr_etage' => 'required|integer',
            'date_construction' => 'required|date',
            'etat' => 'required|boolean',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $bienImmobilier = new BienImmobilier([
            'prix' => $request->get('prix'),
            'superficie' => $request->get('superficie'),
            'nbr_piece' => $request->get('nbr_piece'),
            'prix_achat' => $request->get('prix_achat'),
            'nom_immeuble' => $request->get('nom_immeuble'),
            'nbr_etage' => $request->get('nbr_etage'),
            'date_construction' => $request->get('date_construction'),
            'etat' => $request->get('etat'),
            'image' => $imagePath,
        ]);
        $bienImmobilier->save();

        return response()->json($bienImmobilier, 201);
    }

    /**
     * Modifier un bien
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'superficie' => 'required|float',
            'nbr_piece' => 'required|float',
            'prix_achat' => 'required|float',
            'nom_immeuble' => 'required|string',
            'nbr_etage' => 'required|integer',
            'date_construction' => 'required|date',
            'etat' => 'required|boolean',

        ]);

        $bienImmobilier = BienImmobilier::find($id);

        if ($bienImmobilier) {
            $bienImmobilier->superficie = $request->superficie ?? $bienImmobilier->superficie;
            $bienImmobilier->prix = $request->prix ?? $bienImmobilier->prix;
            $bienImmobilier->nbr_piece = $request->nbr_piece ?? $bienImmobilier->nbr_piece;

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($bienImmobilier->image);
                $bienImmobilier->image = $request->file('image')->store('images', 'public');
            }

            $bienImmobilier->save();

            return response()->json($bienImmobilier, 200);
        }

        return response()->json(['error' => 'BienImmobilier not found'], 404);
    }

    /**
     * Supprimer un bien
     */
    public function destroy($id)
    {
        $bienImmobilier = BienImmobilier::find($id);

        if ($bienImmobilier) {
            if ($bienImmobilier->image) {
                Storage::disk('public')->delete($bienImmobilier->image);
            }
            $bienImmobilier->delete();
            return response()->json(['message' => 'Bien supprimé'], 200);
        }

        return response()->json(['error' => 'Bien introuvable'], 404);
    }

    /**
     * Archiver un bien
     */
    public function bloquer(BienImmobilier $bienImmobilier) : JsonResponse
    {
        try {
            // Update the 'is_archived' attribute of the burger to true
            $bienImmobilier->update(['is_archived' => true]);

            // Return a JSON response with a status code of 204 (No Content)
            return response()->json(null, 204);
        } catch (\Exception $exception) {
            // Return a JSON response with the exception message and a status code of 500 (Internal Server Error)
            return response()->json($exception->getMessage(), 500);
        }
    }
    /**
    * Restaurer un bien
    */
    public function debloquer(BienImmobilier $bienImmobilier) : JsonResponse
    {
        try {
            // Update the Burger to set is_archived to false
            $bienImmobilier->update(['is_archived' => false]);
            // Return a success response with no content
            return response()->json(null, 204);
        } catch (\Exception $exception) {
            // Return an error response with the exception message
            return response()->json($exception->getMessage(), 500);
        }
    }

}
