<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DewaniyaSubCategory extends Model
{
    protected $fillable = ['name', 'dewaniya_category_id'];

    public function category()
    {
        return $this->belongsTo(DewaniyaCategory::class, 'dewaniya_category_id');
    }
}