<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    protected $fillable = ['name', 'description', 'region_id'];

}
