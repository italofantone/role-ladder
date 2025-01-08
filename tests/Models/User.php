<?php

namespace Italofantone\RoleLadder\Tests\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'role',
    ];
}