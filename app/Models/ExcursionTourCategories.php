<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcursionTourCategories extends Model
{
    use HasFactory;
    protected $table = 'excursion_tour_categories';//access the database and table
    protected $guarded = [];
    
}
