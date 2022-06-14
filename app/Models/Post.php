<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['user_id','title'];

    public function user(){
        
        return $this->belongsTo(User::class,'user_id','id')->withDefault([
            'name' => 'Not Avail'
        ]);
    }

    public function tags(){

        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id');
    }

    public function tag(){

        return $this->belongsToMany(Tag::class);
    }

    public function comment(){
        return $this->morphMany(Comments::class,'commentable');
    }

    public function commenthasmany(){
        return $this->hasMany(Comments::class);
    }


}
