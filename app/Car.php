<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable=['type','model','km','dispo','depot_id','portes','carburon','automatic','price','img'];

    public function depot(){
        return $this-> belongsTo('App\Depot');
    }
    public function reservation(){
        return $this-> hasMany('App\Reservation');
    }

}
