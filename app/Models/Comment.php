<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['rating', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function country()
    {                                              // User::class, FK Address::class , Fk Comment::class, User:class 
        return $this->hasOneThrough(Address::class, User::class, 'id', 'user_id', 'user_id', 'id')
            ->select('country as name');
    }
}
