<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    public function bien_immobilier(){
        return $this->belongsTo(BienImmobilier::class);
    }

    public function client(){
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function agent(){
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }

    public function proprietaire(){
        return $this->belongsTo(User::class, 'proprietaire_id', 'id');
    }

    public function reglements(){
        return $this->hasMany(Reglement::class);
    }
}
