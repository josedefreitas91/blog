<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
    /**
     * Get the states for the country.
     */
    public function states() {
        return $this->hasMany('App\Models\State');
        // return $this->hasMany('App\Models\State', 'foreign_key', 'local_key');
    }
}
