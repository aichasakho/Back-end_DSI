<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'bien_immobilier_id',
        'type_annonce',
        'description',
        'statut',
        'prix',
        'image',
    ];
    public function bienImmobilier() {
        return $this->belongsTo(BienImmobilier::class);
    }
}
