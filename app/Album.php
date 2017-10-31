<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $table = "tbl_albums";
    protected $primaryKey = 'album_id';
    public $timestamps = false;


    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function tracks()
    {
        return $this->hasMany('App\Track');
    }
}
