<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'comment_post','comment_post_name','comment_post_date','comment_post_status','comment_post_id'
    ];
    protected $primaryKey = 'commentpost_id';
    protected $table = 'tbl_comment_post';

    public function post(){
        return $this->belongsTo('App\Models\Post','comment_post_id');
    }
}
