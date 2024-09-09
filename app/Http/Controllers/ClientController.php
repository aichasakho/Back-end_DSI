<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClientAccount;
use App\Models\BienImmobilier;
use App\Models\Client;
use App\Models\Visite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiche la liste de tous les clients
     */
    public function index()
    {

        $clientAll=Client::paginate(10);
        return view('admin.client.listes',[
            'clientAll'=>$clientAll
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
     * Enregistre un nouveau client dans la base de données
     */
    public function store(Request $request)
    {

        $client=new Client();
        $client->nom=$request->nom;
        $client->prenom=$request->prenom;
        $client->email=$request->email;
        $client->adresse=$request->adresse ?:'';
        $client->tel=$request->tel;
        $client->password=Hash::make($request->password);

        if($request->hasFile('piece_identite')){
            $client->piece_identite=$request->file('piece_identite')->store('piece','public');
        }

        $client->save();

        return response()->json(['message'=>'Votre compté a été ajouté avec success !']);


    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }

    /**
     * Authentifie un client en utilisant son email ou son numéro de téléphone.
     */
    public function doLogin(Request $request){
        $client = Client::where('email', $request->emailOrTel)
                        ->orWhere('tel', $request->emailOrTel)  // Correction ici
                        ->first();

        if (!$client) {
            return response()->json(['error' => 'Information incorrecte']);
        }

        if (!Hash::check($request->password, $client->password)) {
            return response()->json(['error' => 'Information incorrecte']);
        }

        session()->put(['client' => $client->id]);

        return response()->json(['message' => $client->id]);
    }
    /**
     * Crée une demande de visite pour un client.
     */

    public function visiteClient(Request $request){

        $client=Client::find($request->client_id);
        $bien=BienImmobilier::find($request->bien_id);

        if(!$client &&  !$bien ){
            return response()->json(['error' => 'Veuillez remplir tous les champs 2 !']);
        }
        $visite= new Visite();
        $visite->client_id=$client->id;
        $visite->bien_immobilier_id=$bien->id;
        $visite->date_propose=$request->date_propose;
        $visite->status='En-cours';
        $visite->save();
        return response()->json(['message' => 'Demande envoyé avec succes !']);

    }
}
