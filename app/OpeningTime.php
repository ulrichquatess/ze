<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpeningTime extends Model
{
    protected $table = 'openingtimes';

    protected $fillable = [ 'weekday', 'start', 'end' ];

    public $timestamps = false;



    public function listing()
    {
        return $this->belongsTo('App\Listing');
    }
}
