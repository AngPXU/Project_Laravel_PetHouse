<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImportsProduct implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_id' => $row[0],
            'brand_id' => $row[1],
            'product_name' => $row[2],
            'product_slug' => $row[3],
            'product_tags' => $row[4],
            'product_quantity' => $row[5],
            'product_desc' => $row[6],
            'product_content' => $row[7],
            'product_price' => $row[8],
            'product_image' => $row[9],
            'product_status' => $row[10],
            'product_views' => $row[11],
        ]);
    }
}
