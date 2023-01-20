<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExcursionImage extends Model
{
    use HasFactory;
    protected $fillable = ['link', 'excursion_id'];

    public function excursion(): BelongsTo
    {
        return $this->belongsTo(Excursion::class);
    }

    public function getFileNameAttribute(): string
    {
        $name = explode('/', $this->link);
        return array_pop($name);
    }
}
