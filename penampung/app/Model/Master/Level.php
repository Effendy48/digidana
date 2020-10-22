<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //
    protected $table = "level";

    protected $primaryKey = "id_level";

    public $timestamps = false;
    
    public $incrementing = false;

    protected $fillable = [
        'id_level',
        'level',
        'created_by',
        'created_date',
        'updated_by',
        'updated_date',
        'deleted_by',
        'deleted_date',
        'is_deleted'
    ];
}
