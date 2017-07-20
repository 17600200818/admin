<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
    protected $fillable = [
        'name', 'buyer_id', 'buyer_advertiser_id', 'site_name', 'domain', 'address', 'status', 'remark'
    ];

    public function buyer() {
        return $this->belongsTo('App\Models\Buyer');
    }
}
