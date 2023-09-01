<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title', 'info', 'dine'
    ];
    use HasFactory;
    public function getDoneStausAttribute()
    {
        return $this->done ? 'Dangerous Condition' : 'Normal Condition';
    }
    public function subcategory()
    {
        return $this->belongsTo(subcategory::class, 'sub_category_id', 'id');
    }
    
}
