<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    /** @use HasFactory<\Database\Factories\ClubFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'address',
        'main_colour',
        'secondary_colour',
    ];

    protected $attributes = [
        'name' => '',
        'description' => '',
        'address' => '',
        'main_colour' => '#ff0000',
        'secondary_colour' => '#ffffff',
    ];
}
