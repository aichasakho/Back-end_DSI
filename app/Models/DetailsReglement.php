<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsReglement extends Model
{
    use HasFactory;

    public function reglement()
    {
        return $this->belongsTo(Reglement::class);
    }
}
