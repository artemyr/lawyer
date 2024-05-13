<?php

namespace App\Models;

use App\Models\DTO\Coords;
use App\Models\DTO\PropCollection;
use App\Services\CoordsParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Instation extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class);
    }

    public function instationType(): BelongsTo
    {
        return $this->belongsTo(InstationType::class);
    }

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }

    public function getCoordsAttribute($value): Coords
    {
        return (new CoordsParser())->parse($value);
    }

    public function setPropsAttribute(array $value): void
    {
        if (count($value) > 20) {
            $value = array_slice($value, 0, 20);
        }

        $this->attributes['props'] = serialize($value);
    }

    public function getPropsAttribute($value): PropCollection
    {
        if (empty($value)) {
            return new PropCollection();
        }

        $value = unserialize($value);

        $props = new PropCollection();
        foreach ($value as $item) {
            $props->setProp(label: $item[0], value: $item[1]);
        }

        return $props;
    }
}
