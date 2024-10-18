<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Habitation;

class Type extends Model
{
    use HasFactory;
    protected $guarded=[];

    public  function habitation()
    {
        return $this->hasOne(Habitation::class);
    }
}
