<?php

namespace mobileconnect;

use Illuminate\Database\Eloquent\Model;

class PersonInfo extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'company_name', 'scmconnect_question', 'mobile_no'];
}
