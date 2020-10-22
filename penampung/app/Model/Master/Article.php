<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = "post";

    protected $primaryKey = "id_post";

    public $timestamps = false;
    
    public $incrementing = false;

    protected $fillable = [
        'id_post',
        'id_account',
        'title_post',
        'cover_post',
        'content_post',
        'created_by',
        'created_date',
        'updated_by',
        'updated_date',
        'deleted_by',
        'deleted_date',
        'is_deleted'
    ];
}
