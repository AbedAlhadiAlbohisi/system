<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function getActiveStatusAttribute()
    {
        return $this->active ? 'Active' : 'InActive';
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

    public function notes()
    {
        return $this->hasManyThrough(Note::class, SubCategory::class, 'category_id', 'sub_category_id');
    }

    public function sicke()
    {
        return $this->hasManyThrough(sicke::class, SubCategory::class, 'category_id', 'sub_category_id');
    }
}
