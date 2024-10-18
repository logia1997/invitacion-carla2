<?php

namespace App\Http\Controllers;

use App\Exports\PeopleExports;
use App\Exports\ReservationsExport;
use App\Models\Invitation;
use App\Models\Reservation;
use App\Models\Person;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class admiControlller extends Controller
{
  
    public function index($uno, $dos){
     
        if($uno==1995 && $dos=="moreno"){
               $peoble= Person::all();
            return view("vistaListaInvitaciones", compact("peoble"));
        }
        else{
            dd("Error de verifacion");
        }
        //
    }
    public function donwloadExcelInvitations(){
        return Excel::download(new  PeopleExports, "invitaciones.xlsx");
        redirect()->route("admiLogin");
    }
    
    public function donwloadExcelReservations(){
        return Excel::download(new  ReservationsExport, "reservaciones.xlsx");
        redirect()->route("admiLogin");
    }
    
}
