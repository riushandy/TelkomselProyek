<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /* Relationships */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    /* Cek Role */

    public function isAdmin()
    {
        return $this->role?->role_name === 'Admin';
    }

    public function isStaff()
    {
        return $this->role?->role_name === 'Staff';
    }

    public function isManager()
    {
        return $this->role?->role_name === 'Manager';
    }
}
