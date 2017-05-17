<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Books_udk_codes extends Model
{
    use Notifiable;

    protected $fillable = [
        'book_id', 'udk',
    ];
}
