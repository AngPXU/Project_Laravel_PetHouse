<?php

namespace App\Imports;

use App\Models\CatePost;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImportsCategoryPost implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CatePost([
            'cate_post_name' => $row[0],
            'cate_post_status' => $row[1],
            'cate_post_slug' => $row[2],
            'cate_post_desc' => $row[3],
        ]);
    }
}
