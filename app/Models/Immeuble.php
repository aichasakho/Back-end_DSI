<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Immeuble extends Model
{
    use HasFactory;

    public function appartement():hasMany {
        return $this->hasMany(Appartement::class);
    }
}
