<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

 public function job()
 {
     return $this->belongsTo(Jobs::class, 'job_id');
 }

 public function user()
 {
     return $this->belongsTo(User::class, 'applicant_id');
 }


}
