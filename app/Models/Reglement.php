<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_reglement',
        'numero_reglement',
        'contrat_id',
        'nom',
        'agent_id',
    ];

    public function contrat(){
        return $this->belongsTo(Contrat::class);
    }

    public function agent(){
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }

    public function details_reglements(){
        return $this->hasMany(Reglement::class);
    }
}
