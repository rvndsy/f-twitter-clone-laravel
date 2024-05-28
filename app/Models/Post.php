<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    // enable Laravel mass-assignment for message attribute
    protected $fillable = ['message'];

    // one post belongs to one user
    public function user():BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
}