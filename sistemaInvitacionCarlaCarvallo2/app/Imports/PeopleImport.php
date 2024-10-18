<?php

namespace App\Imports;

use App\Models\Person;
use Maatwebsite\Excel\Concerns\ToModel;

class PeopleImport implements ToModel
{

    private $first=TRUE;
    public function model(array $row)
    {
        if($this->first != true){
            return new Person([
                  
            ]);
        }
        $this->first=false;
    }
}
