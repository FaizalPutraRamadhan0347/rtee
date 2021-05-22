<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['users_id', 'partner_name', 'partner_address', 'partner_phone', 'partner_info'];
}