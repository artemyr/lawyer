<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstationType extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function icon()
    {
        return $this->belongsTo(Icon::class);
    }

    public function instations()
    {
        return $this->hasMany(Instation::class);
    }

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }
}
