<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'class', 'role', 'last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * @param array|string $roles
     * @return bool
     */
    public function hasRole($roles)
    {
        $this->have_roles = $this->getUserRoles();

        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->checkIfUserHasRole($role)) {
                    return true;
                }
            }
        } else {
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getUserRoles()
    {
        return $this->roles()->get();
    }

    /**
     * @param string $role
     * @return bool
     */
    private function checkIfUserHasRole($role)
    {
        foreach ($this->have_roles as $have_role) {
            if ($have_role->slug === $role) {
                return true;
            }
        }
        return false;
    }

    public function book_reservations() {
        return $this->hasMany('App\book_reservations');
    }
}
