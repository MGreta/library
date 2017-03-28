<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book_reservations extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id', 'book_id', 'comment', 'reservation_start_day', 'reservation_end_day',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
