<?php

namespace CountriesTest\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    // public $incrementing = false;
    // protected $primaryKey = 'name';
    // protected $visible = ['name'];
	// protected $hidden = ['pivot'];

    /**
     * Get the states for the country.
     */
    public function states() {
        return $this->hasMany('CountriesTest\Models\State');
        // return $this->hasMany('CountriesTest\Models\State', 'foreign_key', 'local_key');
    }
}
