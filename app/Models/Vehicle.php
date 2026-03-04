<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
    'plate',
    'brand',
    'model',
    'manufacturing_year',
    'client_name',
    'client_lastname',
    'client_document',
    'client_email',
    'client_phone'
    ];
}
