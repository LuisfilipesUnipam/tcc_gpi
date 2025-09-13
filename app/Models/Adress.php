<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = [
        'owner_type','owner_id','street','number','complement','district',
        'city','state','zip','country','notes',
    ];

    public function owner()
    {
        return $this->morphTo();
    }
}
