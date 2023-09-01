<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Mockery\Matcher\Not;
// use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function getGenderkeyAttribute()
    {
        return $this->gender == 'M' ? 'Male' : 'Female';
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
        'created_at',
        'updated_at',
        'email_verified_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Find the user instance for the given username.
     *
     * @param  string  $username
     * @return \App\Models\User
     */
    public function findForPassport($username)
    {
        return $this->where('email', $username)->first();
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'user_id', 'id');
    }
    public function sicke()
    {
        return $this->hasMany(sicke::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(category::class, 'user_id', 'id');
    }

    public function subcategoriesThrough()
    {
        return $this->hasManyThrough(SubCategory::class, category::class, 'user_id', 'category_id');
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'user_id', 'id');
    }
}
