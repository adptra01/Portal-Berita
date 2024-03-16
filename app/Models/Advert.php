<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'position',
        'start_date',
        'end_date',
        'alt',
        'image',
        'click',
    ];
}
