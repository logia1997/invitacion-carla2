<?php

namespace App\Models;
use App\Models\Reservation;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;
    protected $guarded=[];


    public  function reservation()
    {
        return $this->hasOne(Reservation::class);
    }

    public  function person()
    {
        return $this->belongsTo(Person::class);
    }
}
