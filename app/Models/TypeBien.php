<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeBien extends Model
{
    use HasFactory;

    protected $fillable = [ 'type_bien',];
    public function bien_immobiliers(){
        return $this->hasMany(BienImmobilier::class);
    }
}
