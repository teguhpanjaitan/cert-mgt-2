<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    //
    protected $fillable = ['cred_reference', 'awarded_date', 'recipient', 'name_of_award', 'nature_of_award','updated_by'];
}
