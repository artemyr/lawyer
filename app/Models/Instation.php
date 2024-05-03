<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instation extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    public function instationType()
    {
        return $this->belongsTo(InstationType::class);
    }

    public function icon()
    {
        return $this->belongsTo(Icon::class);
    }
}
