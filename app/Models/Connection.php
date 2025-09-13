<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $fillable = [
        'producer_id', 'reseller_id','status','requested_at','responded_at','message'
    ];

    protected $casts = [
        'requested_at' => 'datetime',
        'responded_at' => 'datetime'
    ];

    public function producer()
    {
        return $this->belongsTo(User::class, 'producer_id');
    }

    public function reseller()
    {
        return $this->belongsTo(User::class, 'reseller_id');
    }

    public function scopeForProducer($q, $producerId)
    {
        return $q->where('producer_id', $producerId);
    }
    public function scopeForReseller($q, $resellerId)
    {
        return $q->where('reseller_id', $resellerId);
    }
}
