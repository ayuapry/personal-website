<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        "content_title",
        "content",
        "image",
        "tanggal",
        "url",
        "portocategory_id",
    ];

    public function portocategory()
    {
        return $this->belongsTo(PortoCategory::class);
    }
}
