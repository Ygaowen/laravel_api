<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //1.用户模型关联的表
    public $table = 'user';
    //2.关联表的主键
    public $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *3.允许批量操作的字段
     * @var array
     */
    protected $fillable = [
        'user_name', 'user_pass',
    ];

    //4.禁用时间戳
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
