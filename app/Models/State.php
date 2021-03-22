<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model {
    /**
     * Get the country it belongs to.
     */
    public function country() {
        return $this->belongsTo('App\Models\Country');
    }

    /**
     * Get the cities for the state.
     */
    public function cities() {
        return $this->hasMany('App\Models\City');
        // return $this->hasMany('App\Models\City', 'foreign_key', 'local_key');
    }
}
