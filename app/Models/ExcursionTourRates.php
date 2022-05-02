<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcursionTourRates extends Model
{
    use HasFactory;
    protected $table = 'excursion_tour_rates';//access the database and table
    protected $guarded = [];
    
}
