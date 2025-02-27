<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Table name if different from default (optional)
    protected $table = 'users'; 

    // Fillable properties for mass assignment (optional)
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * A user can have many people that they created.
     */
    public function people()
    {
        return $this->hasMany(Person::class, 'created_by');
    }

    /**
     * A user can have many relationships they created.
     */
    public function relationships()
    {
        return $this->hasMany(Relationship::class, 'created_by');
    }
}
