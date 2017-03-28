<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Option extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'value',
    ];
}
