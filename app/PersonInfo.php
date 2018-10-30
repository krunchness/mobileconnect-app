<?php

namespace speechless;

use Illuminate\Database\Eloquent\Model;

class PersonInfo extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'industry', 'business_name', 'mobile_no'];
}
