<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'subcategory_id'
    ];

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
}
