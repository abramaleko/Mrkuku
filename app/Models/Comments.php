<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable =['context','user_id','post_id'];

      /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo(Blog::class);
    }

     /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
