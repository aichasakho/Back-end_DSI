<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailReglement extends Model
{
    use HasFactory;

    public function reglement() :BelongsTo {
        return $this->belongsTo(Reglement::class);
    }
}
