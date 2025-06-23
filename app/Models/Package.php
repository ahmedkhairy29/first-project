<?php

namespace App\Models;
use App\Models\Feature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    
    public function features()
{
    return $this->hasMany(Feature::class);
}

    protected $fillable = [
    'name', 'name_ar', 'price', 'photo', 'type'
];
}
