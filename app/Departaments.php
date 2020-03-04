<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departaments extends Model {
    
    protected  $fillable = ['title','description','logo'];

    public function users() {
        return $this->belongsToMany(User::class, 'users_departaments', 'departament_id', 'user_id');
    }
}
