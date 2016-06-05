<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['name','adresse','tel'];


    public function reservation(){
        return $this-> hasMany('App\Reservation');
    }
}
