<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=['project_id','investor_id','amount','start_date'];

    public function investor()
    {
        return $this->belongsTo(User::class,'investor_id');
    }


}
