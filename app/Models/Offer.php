<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'order_id',
        'mark',
        'model',
        'year',
        'run',
        'color',
        'body_type',
        'engine_type',
        'transmission',
        'gear_type',
        'generation_id'
    ];
}
