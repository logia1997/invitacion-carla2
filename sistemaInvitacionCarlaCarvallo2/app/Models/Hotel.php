<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Habitation;

class Hotel extends Model
{
    use HasFactory;
    protected $guarded=[];
    public  function habitation()
    {
        return $this->hasMany(Habitation::class);
    }
}
