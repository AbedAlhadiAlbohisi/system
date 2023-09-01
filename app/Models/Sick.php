<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Sick extends Model
{
    use HasFactory, HasApiTokens, Notifiable, HasRoles;
    public function getDangerStatusAttribute()
    {
        return $this->danger == 1 ? 'Danger' : 'Infection';
    }
    public function getGenderkeyAttribute()
    {
        return $this->gender == 'M' ? __('cms.male') :  __('cms.female');
    }

    public function getGenderkeysAttribute()
    {
        return $this->Last_name  == 'M' ? __('cms.malew') : __('cms.femalew');
    }


    public function subcategory()
    {
        return $this->belongsTo(subcategory::class, 'sub_category_id', 'id');
    }
}
