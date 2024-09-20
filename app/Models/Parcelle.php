<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
  use HasFactory;

  protected $fillable = [
    'bien_immobilier_id',
    'numero_parcelle',
    'superficie',
  ];
  public function bienImmobilier()
  {
    return $this->belongsTo(BienImmobilier::class);
  }
}
