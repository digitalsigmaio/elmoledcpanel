<?php

namespace App;



class Artist extends Model
{
    //
    protected $table = "tbl_artist";
    public $timestamps = false;

    public function albums()
    {
        return $this->hasMany('App\Album');
    }

    public function tracks()
    {
        return $this->hasMany('App\Track');
    }
}
