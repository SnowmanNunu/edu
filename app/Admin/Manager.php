<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    protected $table = 'manager';

    //使用trait，就相当于将整个trait代码段复制到这个位置
    use Authenticatable;

}
