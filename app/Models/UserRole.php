<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    const Students = 'Student';
    const Teachers = 'Teacher';
    protected $table='user_role';
}

