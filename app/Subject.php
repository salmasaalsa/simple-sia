<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = "id_subject";
    protected $fillable = [
        'id_subject',
        'subject'
    ];

    protected $table = 'subject'; 
}
