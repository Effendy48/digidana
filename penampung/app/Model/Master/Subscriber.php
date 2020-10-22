<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    //
    protected $table = "subscriber";

    protected $primaryKey = "id_subscriber";

    public $timestamps = false;
    
    public $incrementing = false;

    protected $fillable = [
        'id_subscriber',
        'email_subscriber',
        'created_date'
    ];
}
