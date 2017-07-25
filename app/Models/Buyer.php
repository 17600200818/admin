<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = [
        'email', 'password', 'role_id', 'linkman', 'tel', 'buy_type', 'creative_audit_type', 'company', 'address', 'zip', 'gain_type', 'gain_rate', 'last_login_ip', 'status'
    ];

    public function advertisers() {
        return $this->hasMany('App\Models\Advertiser');
    }
}
