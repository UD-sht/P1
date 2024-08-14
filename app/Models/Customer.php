<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;

class Customer extends AuthenticatableUser implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'customer'; // Adjust table name if necessary
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Implement required methods for Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id'; // Return the name of the unique identifier for the user
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Return the unique identifier for the user
    }

    public function getAuthPassword()
    {
        return $this->password; // Return the hashed password
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Return the remember token
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // Set the remember token
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Return the name of the remember token column
    }
}
