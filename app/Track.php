<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    //
    protected $table = "tbl_tracks";
    public $timestamps = false;

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function album()
    {
        return $this->belongsTo('App\Album');
    }
}
