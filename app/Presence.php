<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $table = 'presences';
    protected $fillable = [
        'id', 'student', 'date', 'status',
    ];
}
