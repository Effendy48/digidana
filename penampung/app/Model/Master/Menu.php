<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = "menu";

    protected $primaryKey = "id_menu";

    public $timestamps = false;
    
    public $incrementing = false;

    protected $fillable = [
        'id_menu',
        'menu',
        'icon',
        'type_menu',
        'id_sub_menu',
        'route',
        'created_by',
        'created_date',
        'updated_by',
        'updated_date',
        'deleted_by',
        'deleted_date',
        'is_deleted'
    ];
}
