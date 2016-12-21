<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = array('name',
                                'recorded_date',
                                'release_date',
                                'number_of_tracks',
                                'label',
                                'producer',
                                'genre');

    public $timestamps = true;

    public function band()
    {
        return $this->belongsTo('App\Band');
    }
}
