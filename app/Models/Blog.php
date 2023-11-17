<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        "image",
        "title",
        "content",
        "blogcategory_id",
    ];

    public function blogcategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
