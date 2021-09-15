<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    public $timestamps = false;
 
        /**
     * Get the user that owns the support request.
     */
    public function user()
    {
        return $this->belongsTo(User::class,'investor_id');
    }

    public function servitor()
    {
        return $this->belongsTo(User::class,'servitor_id');
    }

     /**
     * Get the chats for the issue request.
     */
    public function chats()
    {
        return $this->hasMany(SupportChat::class,'support_id');
    }



}
