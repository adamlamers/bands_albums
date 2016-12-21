<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'bands';
    protected $fillable = array('name', 'start_date', 'website', 'still_active');

    public $timestamps = true;

    public function albums()
    {
        return $this->hasMany('App\Album');
    }

}
