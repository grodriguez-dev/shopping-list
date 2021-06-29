<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'name',
        'status'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
}
