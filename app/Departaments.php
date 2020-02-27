<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departaments extends Model {

    public function users() {
        return $this->belongsToMany(User::class, 'users_departaments', 'user_id','departament_id');
    }
}
