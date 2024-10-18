<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invitation;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded=[];

    public  function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
    public  function habitation()
    {
        return $this->belongsTo(Habitation::class);
    }

}
