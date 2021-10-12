<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'code',
    ];

    public $timestamps = ['created_at'];
    const UPDATED_AT = null;
}
