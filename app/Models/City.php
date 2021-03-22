<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Get the state it belongs to.
     */
    public function state() {
        return $this->belongsTo('App\Models\State');
    }
}
