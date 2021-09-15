<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportChat extends Model
{
    use HasFactory;

    protected $fillable = ['support_id','context','attachment','sender_id','read'];

    public function user()
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function request()
    {
        return $this->belongsTo(Support::class,'support_id');
    }
}
