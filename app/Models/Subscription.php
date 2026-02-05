<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];

     protected $casts = [
        'trial_end_at' => 'datetime',
        'end_at' => 'datetime',
    ];


    public function subscriptions(){
        return $this->hasMany(\App\Models\Subscription::class);
    }

    public function currentSubscription(){
        return $this->subscriptions()->latest()->first();
    }

    public function hasActiveAccess(){
        $sub = $this->currentSubscription();
        if(!$sub) return false;
        // return 'ok';
        if ($sub->status === 'active') return true;
        // return 'no';
        if ($sub->status === 'trial' && $sub->trial_end_at && $sub->trial_end_at->isFuture()) return true;

        // return "no";
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}