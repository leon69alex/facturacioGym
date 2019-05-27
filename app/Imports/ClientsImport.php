<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'name' => $row[0],
            'surnames' => $row[1],
            'email' => $row[2],
            'phone' => $row[3],
            'dni' => $row[3],
            'cuote_id' => 1,
            'CCC' => $row[4],
            'IBAN' => $row[5],
            'SWIFT' => $row[6],
            'active' => 1,
        ]);
    }
}
