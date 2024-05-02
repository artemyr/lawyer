<?php

namespace App\Models;

use App\Models\DTO\Coords;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function instationTypes()
    {
        return $this->belongsToMany(InstationType::class);
    }

    public function instations()
    {
        return $this->hasMany(Instation::class);
    }

    public function getCoordsAttribute($value)
    {
        $coords = explode(';',$value);

        if (
            !empty($coords[0])
            &&
            !empty($coords[1])
            &&
            !empty($coords[2])
        ) {
            return new Coords($coords[0],$coords[1],$coords[2]);
        }

        return new Coords();
    }
}
