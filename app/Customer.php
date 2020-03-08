<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{    
    protected $table = 'customers';
    protected $primaryKey = 'id';
    
    public $timestamps = false;
    public $keyType = 'integer';
    public $incementing = true;

}
