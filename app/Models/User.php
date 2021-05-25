<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    const ROLE_NAMES = [
        'Manager',
        'WarehouseManager',
        'Worker'
    ];

    const MANAGER_ROLE_ID = 1;
    const WAREHOUSE_MANAGER_ROLE_ID = 2;
    const WORKER_ROLE_ID = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Find the user instance for the given username.
     *
     * @param string $login
     * @return User
     */
    public function findForPassport(string $login): User
    {
        return $this->where('login', $login)->first();
    }

    /**
     * Validate the password of the user for the Passport password grant.
     *
     * @param string $pincode
     * @return bool
     */
    public function validateForPassportPasswordGrant(string $pincode): bool
    {
        return $pincode === $this->pincode;
    }

    public function taskAssignments(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
