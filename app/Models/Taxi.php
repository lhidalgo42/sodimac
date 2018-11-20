<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    public function users(){
        return $this->BelongsToMany(User::class,'taxi_user');
    }
    public function passengers(){
        return $this->belongsToMany(User::class, 'taxi_user', 'taxi_id', 'user_id')->withPivot('passengers');
    }
}
