<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    public function bienImmobilier() {
        return $this->belongsTo(BienImmobilier::class);
    }
}
