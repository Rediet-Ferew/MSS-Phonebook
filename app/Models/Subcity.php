<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcity extends Model
{
    use HasFactory;


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    protected $fillable = ['name', 'description', 'city_id'];
}
