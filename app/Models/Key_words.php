<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key_words extends Model
{
    use HasFactory;
    protected $table = 'key_words';

    protected $fillable = [
        'id',
        'name',
        'status',
        'created_at',
        'updated_at'
    ];
}
