<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    const PAGINATE_PER_PAGE = 10;

    protected $fillable = [
        'name',
        'content',
    ];

    protected $cast = [
        'name' => 'string',
        'content' => 'string',
    ];
}
