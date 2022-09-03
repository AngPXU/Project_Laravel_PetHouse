<?php

namespace App\Imports;

use App\Models\CategoryProductModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CategoryProductModel([
            'category_name' => $row[0],
            'category_slug' => $row[1],
            'category_desc' => $row[2],
            'meta_keywords' => $row[3],
            'category_parent' => $row[4],
            'category_status' => $row[5],
            'category_order' => $row[6],
        ]);
    }
}
