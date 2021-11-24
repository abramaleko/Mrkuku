<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=['name','residence_location','relationship','email','phone_no'];



}
