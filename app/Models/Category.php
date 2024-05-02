<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = false;

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    public function icon()
    {
        return $this->hasOne(Icon::class, 'id','icon_id');
    }

    public function instations()
    {
        return $this->hasMany(Instation::class);
    }

    public function children () {
        return $this->hasMany(self::class, 'parent_id');
    }
}
