<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'hotel_phong', 'hotel_tenpet', 'hotel_giong', 'hotel_thoigiangui', 'hotel_tenkhach', 'hotel_sdt', 'hotel_anh', 'hotel_loinhan','hotel_trangthai'
    ];
    protected $primaryKey = 'hotel_id';
    protected $table = 'tbl_hotel';
}
