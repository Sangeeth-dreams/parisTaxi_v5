<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassengerCategories extends Model
{
    use HasFactory;
    protected $table = 'passenger_categories';//access the database and table
    protected $guarded = [];

}
