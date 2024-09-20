<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json($users, 200);
    }

    public function show($id){
        $user = User::find($id);
        return response()->json($user, 200);
    }

    public function getClients(){
        $users = User::where('role', 'client')->get();
        return response()->json($users, 200);
    }

    public function getAdmins(){
        $users = User::where('role', 'admin')->get();
        return response()->json($users, 200);
    }

    public function getProrietaires(){
        $users = User::where('role', 'proprietaire')->get();
        return response()->json($users, 200);
    }

    public function addAdmin(UserFormRequest $request){

        $user = User::create([
            $request->only('nom', 'prenom', 'email', 'password', 'tel', 'ninea', 'regitreDeCommerce'),
            'role' => 'admin',
        ]);
        return response()->json($user, 200);
    }

    public function addClient(UserFormRequest $request){
        $user = User::create([
            $request->only('nom', 'prenom', 'email', 'password', 'tel', 'cni', 'adresse'),
            'role' => 'client',
        ]);
        return response()->json($user, 200);
    }

    public function addProprietaire(UserFormRequest $request){
        $user = User::create([
            $request->only('nom', 'prenom', 'email', 'password', 'tel', 'cni', 'adresse'),
            'role' => 'proprietaire',
        ]);
        return response()->json($user, 200);
    }

    public function update(UserFormRequest $request, $id){
        $user = User::find($id);
        $user->update($request->only('nom', 'prenom', 'email', 'password', 'tel', 'cni', 'adresse'));
        return response()->json($user, 200);
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return response()->json($user, 200);
    }
}
