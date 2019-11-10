<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Person extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'id', 'name', 'email',
    ];
}
