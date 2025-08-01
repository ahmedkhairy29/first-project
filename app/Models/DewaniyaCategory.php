<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DewaniyaCategory extends Model
{
    protected $fillable = ['name'];

    public function subcategories()
    {
        return $this->hasMany(DewaniyaSubCategory::class);
    }
}