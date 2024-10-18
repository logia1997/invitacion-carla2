<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;
use  Illuminate\Contracts\View\View;
use  Maatwebsite\Excel\Concerns\FromView;

class ReservationsExport implements FromView
{
    public function view():View
    {
        $reservations= Reservation::all();
        return view("exportReservation", compact("reservations"));
    }
}

