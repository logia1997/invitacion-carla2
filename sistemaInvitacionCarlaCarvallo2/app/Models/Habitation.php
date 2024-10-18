<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Hotel;
class Habitation extends Model
{
    use HasFactory;
    protected $guarded=[];

    public  function type()
    {
        return $this->belongsTo(Type::class);
    }
    public  function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public  function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
   
}
