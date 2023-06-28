<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_id',
        'text',
        'file'
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function likes(): hasMany
    {
        return $this->hasMany(Like::class);
    }
}
