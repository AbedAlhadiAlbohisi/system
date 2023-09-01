<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    public function getActiveStatusAttribute()
    {
        return $this->active ? 'Active' : 'InActive';
    }


    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
    public function notes()
    {
        return $this->hasMany(Note::class, 'sub_category_id', 'id');
    }
    public function sicke()
    {
        return $this->hasMany(sicke::class, 'sub_category_id', 'id');
    }
}