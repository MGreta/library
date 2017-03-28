<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function book()
    {
        /*return $this->hasOne('App\Language', 'language', 'id');*/
        return $this->hasMany('App\Book');
    }
}
