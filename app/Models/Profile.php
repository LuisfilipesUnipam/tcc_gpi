<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'user_id','company_name','document_id','state_registration','phone','notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adresses()
    {
        return $this->morphMany(Adress::class, 'owner');
    }


}
