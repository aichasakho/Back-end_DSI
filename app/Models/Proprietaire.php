<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proprietaire extends Model
{
    use HasFactory;

    public function contrat() :hasMany {
        return $this->hasMany(Contrat::class);
    }


    public function bienImmobilier() :hasMany {
        return $this->hasMany(BienImmobilier::class);
    }
}
