<?php

namespace App\Http\Controllers;

use App\Models\Habitation;
use App\Models\Hotel;
use App\Models\Invitation;
use App\Models\Reservation;
use App\Models\Person;
use Illuminate\Http\Request;

class InvitationController extends Controller
{

    public function index($name, $lastName, $numberPasses, $phoneNumber, $tableNumber)
    {
        $person=Person::where("name", $name)->where("phoneNumber", $phoneNumber)->where("lastName", $lastName)->first();
        if($person==NULL){
            $person=$this->storePerson($name, $lastName, $phoneNumber);
            $invitation=$this->storeInvitation($person->id, $numberPasses,  $tableNumber);    
            // $reservation=$this->storeReservation($invitation->id);    
        }
        // return redirect("http://127.0.0.1:8000/invitacion/".$person->id);
        return redirect()->route("invitacionView", [$person->id]);
    }

    public function invitationView($id)
    {
        $person=Person::where("id", $id)->first();
        return view("vistaInvitacion", compact("person"));  
    }
   
    public function create()
    {
     
    }
    public function storeInvitation($person_id, $numberPasses,  $tableNumber)
    {
        return Invitation::create([
            "person_id" => $person_id,
            "numberPasses"=>$numberPasses,
            "numberTable" =>$tableNumber,
            "state"=> 0
        ]);
    }

    public function storePerson($name, $lastName, $phoneNumber)
    {
        return Person::create([
            "name" => $name,
            "lastname"=>$lastName,
            "phoneNumber"=>$phoneNumber
        ]);
    }

  



    public function reservation($id_person)
    {
        $person=Person::find($id_person);
        $reservations=Reservation::all();
        $habitations= Habitation::all();
        return view("vistaReservacion", compact("person", "habitations", "reservations"));  
    }

  
    public function storeReservation($id_person, $habitation_id)
    {
        $person=Person::find($id_person);
        $habitation=Habitation::find($habitation_id);
        $habitation->cantidad-=1;
        if($habitation->cantidad<0)$habitation=0;
        $habitation->save();
        Reservation::create([
            "invitation_id" => $person->invitation->id,
            "habitation_id" => $habitation_id,
        ]);
        return redirect()->route("reservacion", [$id_person]);
    }

    public function editReservation($id_person,  $habitation_id)
    {
        $person=Person::find($id_person);

        $habitationOld=Habitation::find($person->reservation->habitation_id);
        $habitationOld->cantidad+=1;
        $habitationOld->save();

        $habitation=Habitation::find($habitation_id);
        $habitation->cantidad-=1;
        if($habitation->cantidad<0)$habitation=0;
        $habitation->save();

        $person->reservation->habitation_id=$habitation_id;
        $person->reservation->save();
        return redirect()->route("reservacion", [$id_person]);
    }

    public function deleteReservation($id_person,  $habitation_id)
    {
        $person=Person::find($id_person);
        $habitation=Habitation::find($habitation_id);
        $habitation->cantidad+=1;
        $habitation->save();
        $reservacion=$person->reservation;
        $reservacion->delete();
        return redirect()->route("reservacion", [$id_person]);
    }

 
    public function update(Request $request, Invitation $invitation)
    {
        //
    }


    public function destroy(Invitation $invitation)
    {
        //
    }

  

    public function updateInvitation(Request $request, $id_person){
        $van=false;
        $person=Person::find($id_person);
        $num=0;
        if($request->input("yes")){
            $num=1;
            $van=true;
        }
        else{
            $num=2;
        }
        $person->invitation->state=$num;
        $person->invitation->save();


       
        return redirect()->route("invitacionView", [$person->id]);
    }
    
    public function codigoVestimenta(){
            return view("codigoVestimenta");
    }
}
