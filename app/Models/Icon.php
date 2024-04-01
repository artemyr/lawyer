<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    use HasFactory;

    public function getTypeAttribute(): string
    {
        return (preg_match("/\.png$/", $this->code)) ? 'png' : 'svg';
    }
}
