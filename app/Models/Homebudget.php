<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homebudget extends Model
{
    use HasFactory;

    protected $teble = 'homebudgets';

    protected $fillable = [
        'date', 'category_id', 'price'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

}
