<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class city extends Model
{

    use HasFactory, HasRoles;
    protected $hidden =
    [
        'created_at',
        'updated_at',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function getactivestatusAttribute()
    {
        return $this->active == 1 ? 'Active' : 'InActive';
    }
}
