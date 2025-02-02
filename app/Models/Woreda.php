<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Woreda extends Model
{
    use HasFactory;

    public function subcity()
    {
        return $this->belongsTo(Subcity::class, 'subcity_id');
    }

    protected $fillable = ['name', 'description', 'subcity_id'];
}
