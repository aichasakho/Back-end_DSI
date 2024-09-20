<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartement extends Model
{
  use HasFactory;

  protected $fillable = [
    'type_de_bail',
    'nbr_piece',
    'bien_immobilier_id',
    'montant_caution',
  ];
  public function bienImmobilier()
  {
    return $this->belongsTo(BienImmobilier::class);
  }
}
