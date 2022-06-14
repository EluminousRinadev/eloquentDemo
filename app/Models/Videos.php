<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;

    public function comment(){
        return $this->morphMany(Comments::class,'commentable');
    }

    public function tags(){

        return $this->morphToMany(Tag::class,'taggable');
    }


}
