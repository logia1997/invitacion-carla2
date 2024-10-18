<?php

namespace App\Exports;

use App\Models\Person;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use  Maatwebsite\Excel\Concerns\FromView;

class PeopleExports implements FromView
{
 
    public function view():View
    {
       $people= Person::all();
        return view("exportPerson", compact("people"));
    }
}


