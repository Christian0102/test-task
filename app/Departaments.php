<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departaments extends Model
{
    
    
    
    public function user() {
        return $this->belongsToMany(User::class, 'users_departaments');
    }
}
