<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImportsPost implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'post_title' => $row[0],
            'post_slug' => $row[1],
            'post_desc' => $row[2],
            'post_content' => $row[3],
            'post_meta_desc' => $row[4],
            'post_meta_keywords' => $row[5],
            'post_status' => $row[6],
            'post_image' => $row[7],
            'post_poster' => $row[8],
            'cate_post_id' => $row[9],
            'time' => $row[10],
            'post_views' => $row[11],
        ]);
    }
}
