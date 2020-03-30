<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    //
    protected $fillable = [
        'number', 'name', 'date', 'type', 'awarded', 'certified', 'updated_by', 'deleted'
    ];
}
