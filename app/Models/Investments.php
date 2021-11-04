<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investments extends Model
{
    use HasFactory;

    protected $fillable=['project_id','user_id','amount','units'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoices::class);
    }

    public function project()
    {
        return $this->belongsTo(Projects::class);
    }
}
