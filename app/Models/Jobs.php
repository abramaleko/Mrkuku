<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
        'application_deadline'
    ];

    public function applicants()
    {
        return $this->hasMany(Applications::class,'job_id');
    }
}
