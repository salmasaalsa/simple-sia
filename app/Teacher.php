<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $primaryKey = "id_teacher";
    protected $fillable = [
        'id_teacher',
        'full_name',
        'date_of_birth',
        'place_of_birth',
        'address',
        'phone',
        'email'
    ];

    protected $table = 'teachers' ;
}
