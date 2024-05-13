<?php

namespace App\Models;

use App\Models\DTO\Coords;
use App\Services\CoordsParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
    public function instationTypes(): BelongsToMany
    {
        return $this->belongsToMany(InstationType::class);
    }

    public function instations(): BelongsToMany
    {
        return $this->belongsToMany(Instation::class);
    }

    public function getCoordsAttribute($value): Coords
    {
        return (new CoordsParser())->parse($value);
    }
}
