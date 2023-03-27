<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class news extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $fillable = [
        'id',
        'category_id',
        'author_id',
        'title',
        'sub_title',
        'comment',
        'created_at',
        'updated_at'
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
