<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortoCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function portos()
    {
        return $this->hasMany(Porto::class);
    }
}
