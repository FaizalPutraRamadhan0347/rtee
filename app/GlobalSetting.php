<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    protected $table = 'global_setting';
    protected $fillable = ['persen', 'inforekening'];
}
