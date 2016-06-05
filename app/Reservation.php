<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=['date_debut','date_fin','depot_debut','depot_fin','car_id','client_id'];


    public function car(){
        return $this-> belongsTo('App\Car');
    }
    public function client(){
        return $this-> belongsTo('App\Client');
    }
}
