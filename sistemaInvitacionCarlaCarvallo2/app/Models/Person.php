<?php

namespace App\Models;

use App\Models\Invitation;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $guarded=[];

    public  function invitation()
    {
        return $this->hasOne(Invitation::class);
    }

    public  function reservation()
    {
        return $this->hasOneThrough(Reservation::class, Invitation::class);
    }
}
