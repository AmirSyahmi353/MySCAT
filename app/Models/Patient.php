<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Patient extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'patients';

    protected $fillable = ['name', 'email', 'score', 'status', 'image'];
}
