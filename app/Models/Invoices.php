<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $fillable=['invoice_number','expiry_date'];

    public function verifiedByUser()
    {
        return $this->belongsTo(User::class,'verified_by');
    }
}
