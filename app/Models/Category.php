<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }
}
