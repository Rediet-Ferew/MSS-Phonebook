<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function subcity()
    {
        return $this->belongsTo(Subcity::class, 'subcity_id');
    }

    public function woreda()
    {
        return $this->belongsTo(Woreda::class, 'woreda_id');
    }

    protected $fillable = ['cover_image', 'name', 'description', 'phone', 'cat_id', 'location', 'branch', 'city_id', 'subcity_id', 'woreda_id'];
}


