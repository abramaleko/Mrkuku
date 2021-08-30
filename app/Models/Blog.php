<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table='blogs';

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','content','category_id','status','image_path'];

    public function category()
    {
        return $this->belongsTo(blogCategories::class,'category_id');
    }
}
