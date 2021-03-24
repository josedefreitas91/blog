<?php

namespace CountriesTest\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model {
    /**
     * Get the country it belongs to.
     */
    public function country() {
        return $this->belongsTo('CountriesTest\Models\Country');
    }

    /**
     * Get the cities for the state.
     */
    public function cities() {
        return $this->hasMany('CountriesTest\Models\City');
        // return $this->hasMany('CountriesTest\Models\City', 'foreign_key', 'local_key');
    }
}
