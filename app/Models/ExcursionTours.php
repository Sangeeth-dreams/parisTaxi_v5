<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcursionTours extends Model
{
    use HasFactory;
    protected $table = 'excursion_tours';//access the database and table
    protected $guarded = [];
}