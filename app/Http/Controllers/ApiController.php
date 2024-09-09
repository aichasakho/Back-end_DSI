<?php

namespace App\Http\Controllers;

use App\Models\BienImmobilier;
use App\Models\Proprietaire;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    /**
     * Récupère tous les biens immobiliers avec leurs catégories et propriétaires associés.
     */
    public function index(){

        $BienImmobilier=BienImmobilier::with('categorie','proprietaire')->get();

        return $BienImmobilier;
    }

    /**
     * Récupère et retourne une image spécifique à partir du stockage.
     */

    public function getImage($file)
    {
        $filePath = 'storage/bien/'. $file;


        if (!file_exists($filePath)) {
            return response()->json(['Error' => "Bien non trouvé"], 404);
        }

        $image = file_get_contents($filePath);

        $mimeType = mime_content_type($filePath);

        return response($image, 200)
            ->header('Content-Type', $mimeType)
            ->header('Content-Length', strlen($image));
    }


    /**
     * Enregistre un nouveau propriétaire dans la base de données.
     */
    public function store(Request $request){

        $user= new Proprietaire();
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->tel=$request->tel;
        $user->adresse=$request->adresse;
        $user->profile='';

        $user->save();


        return response()->json(['Propriétaire ajouté avec success !'=>$user]);

    }
}
