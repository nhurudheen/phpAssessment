<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasUlids;
    use HasFactory;
    protected $fillable = [
        'full_name', 'email_address', 'phone_number', 'password', 'cv',
    ];

    protected $hidden = [
        'password',
    ];
}
