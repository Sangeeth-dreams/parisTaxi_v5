<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    use HasFactory;
    protected $table = 'rates';//access the database and table
    protected $guarded = [];


public function tourCategories(){

    return $this->belongsTo('App\Models\TourCategories');  

}

public function tourSubCategories(){

    return $this->belongsTo('App\Models\TourSubCategories');  

}

public function passengerCategories(){

    return $this->belongsTo('App\Models\PassengerCategories');  

}

public function places(){

    return $this->belongsTo('App\Models\Places');  

}

}