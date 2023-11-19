<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = false;

//    public function city()
//    {
//        return $this->belongsTo(City::class);
//    }

    public function children () {
        return $this->hasMany(self::class, 'parent_id');
    }
}
