<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;

    public function bien_immobilier(){
        return $this->belongsTo(BienImmobilier::class);
    }
}
