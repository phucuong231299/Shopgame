<?php

namespace App\Imports;

use App\Models\huyen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class HuyenImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new huyen([
            'mahuyen' => $row['mahuyen'],
            'tenhuyen' => $row['tenhuyen'],
            'matinh' => $row['matinh'],
        ]);
    }
}
