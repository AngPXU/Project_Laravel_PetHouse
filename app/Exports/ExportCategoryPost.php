<?php

namespace App\Exports;

use App\Models\CatePost;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCategoryPost implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CatePost::all();
    }
}
