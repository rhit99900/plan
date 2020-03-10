<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $primaryKey = 'id';
    
    public $timestamps = false;
    public $keyType = 'integer';
    public $incementing = true;

    public function projects(){
        return $this->hasMany('App\Project','owner_team_id','id');
    }    
}
