<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherReservations extends Model
{
    use HasFactory;
    protected $table = 'other_reservations';//access the database and table
    protected $guarded = [];

}
