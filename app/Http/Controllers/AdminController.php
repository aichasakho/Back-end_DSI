<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUsersAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    /**
     * Affiche une liste de tous les utilisateurs.
     */
    public function index(){

        $usersAll=User::paginate(10);
        return view("admin.account.index",compact("usersAll"));
    }

    /**
     * Affiche le formulaire de connexion
     */
    public function login(){
        return view("admin.account.login");
    }

    /**
     * Authentifie un utilisateur avec ses informations d'identification.
     */

    public function doLogin(Request $request){

        $request->validate([
           'email'=>'required',
           'password'=>'required'
        ],[
            'email.required'=>'L email est requis dans le formulaire',
            'password.required'=>'Le mots de passe est requis dans le formulaire'

        ]);

        if(!Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                      toastr()->error('Information introuvable');
                      return back();
        }
        toastr()->info('Bienvenue !'.Auth::user()->nom);

        return redirect()->route('home.admin');

    }

    /**
     * Enregistre un nouvel utilisateur dans la base de données.
     */
    public function store(AddUsersAccountRequest $request){

        if($request->password != $request->password_confirmation){
            return back()->with("error","Les mots de passes sont différents");
        }
       
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->password = bcrypt($request->password);
        
        $user->save();
        return redirect()->back()->with("success","Compte ajouté avec succes !");
    }

    /**
     * Affiche la page d'accueil de l'administration.
     */
    public function home(){
        return view('admin.index');
    }
}
