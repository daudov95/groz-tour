<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExcursionSchedule extends Model
{
    use HasFactory;
    protected $fillable = ['time', 'price', 'excursion_id'];

    public function getCustomDateAttribute(): string
    {
        return date('d.m.Y H:i', (int)$this->time);
    }

    public function excursion(): BelongsTo
    {
        return $this->belongsTo(Excursion::class);
    }

    public function getFloatPriceAttribute(): string
    {
        return number_format($this->price, 2, '', '');
    }

    public function getFormatPriceAttribute(): string
    {
        return number_format($this->price, 0, '', ' ');
    }
}
