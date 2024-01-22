<?php

namespace App\Imports;

use App\Models\Service;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServicesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Service([
            "modality_code" => $row['modality_code'],
            "procedure_code" => $row['procedure_code'],
            "procedure_name" => $row['procedure_name'],
            "price" => $row['price']
        ]);
    }
}
