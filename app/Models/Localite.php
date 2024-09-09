<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    use HasFactory;

    public function bien_immobiliers(){
        return $this->hasMany(BienImmobilier::class);
    }
}
