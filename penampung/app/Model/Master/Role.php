<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = "menu_role";
    public $primaryKey = "id_menu_role";
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_role',
        'id_menu',
        'id_level',
        'access',
        'input',
        'modify',
        'delete',
        'is_deleted'
    ];
}
