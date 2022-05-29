<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produce extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'farmer_id','description','price'
    ];

    public function user()
    {
     return $this->belongsTo('App\Models\User', 'farmers_id');
    }
}
