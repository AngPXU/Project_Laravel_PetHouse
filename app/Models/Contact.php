<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'contact_name','contact_email','contact_phone','contact_notes','contact_status'
    ];
    protected $primaryKey = 'contact_id';
    protected $table = 'tbl_contact';
}
