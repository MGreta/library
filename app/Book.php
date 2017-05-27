<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'isbn', 'date', 'size', 'language', 'type', 'udk', 'quantity', 'about', 'publishing_house', 'city', 'genre'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    public function language()
    {
        /*return $this->hasOne('App\Language', 'language', 'id');*/
        return $this->belongsTo('App\Language');
    }

    /*public function author()
    {
        return $this->belongsTo('App\Author', 'author', 'id');
    }*/
}
