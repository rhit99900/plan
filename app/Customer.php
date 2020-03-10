<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{    
    protected $table = 'customers';
    protected $primaryKey = 'id';
    
    public $timestamps = false;
    public $keyType = 'integer';
    public $incementing = true;

    //Relation with Other Tables

    public function projects(){
        return $this->hasMany('App\Project','added_by_customer_id','id');
    }    

}
