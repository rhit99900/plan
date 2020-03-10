<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    
    public $timestamps = false;
    public $keyType = 'integer';
    public $incementing = true;

    public function user(){
        return $this->hasMany('App\User','added_by_customer_id','id');
    }

    public function team(){
        return $this->hasMany('App\Team','owner_team_id','id');
    }   
}
