<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Comment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tweet_id',
        'text'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
}