<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanics extends Model
{
    use HasFactory;

    public function carOwner(){

     return  $this->hasOneThrough(Owners::class,Cars::class,
    'mechanic_id', // Foreign key on the car table
    'car_id',// Foreign key on the Owner table
    'id',// Local key on the mechanics table
    'id'// Local key on the car table
    );
    }

    
}
