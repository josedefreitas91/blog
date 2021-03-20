<?php

namespace BaseExample\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'name';
    protected $visible = ['name'];

	protected $hidden = ['pivot'];

}
