<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable As AuthenticatableTrait;

class Account extends \Eloquent implements Authenticatable
{
    //
    use AuthenticatableTrait;

    public function getRememberToken()
    {
        return null;

    }
    public function setRememberToken($value){

    }
    public function getRememberTokenName()
    {
        return null;
    }
    public function setAttribute($key, $value){
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if(!$isRememberTokenAttribute){
            parent::setAttribute($key, $value);
        }
    }

    protected $table = "account";
    protected $primaryKey = "id_account";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_account',
        'first_name',
        'last_name',
        'email',
        'password',
        'jenis_kelamin',
        'tgl_lahir',
        'tempat_lahir',
        'id_level',
        'created_by',
        'created_date',
        'updated_by',
        'updated_date',
        'deleted_by',
        'deleted_date',
        'is_confirm',
        'is_suspend',
        'is_deleted'
    ];
}
