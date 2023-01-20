<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Excursion extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'including', 'program', 'age', 'place', 'duration'];

    public function images(): HasMany
    {
        return $this->hasMany(ExcursionImage::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(ExcursionSchedule::class);
    }

    public function getExcerptAttribute()
    {
        return strip_tags(str()->limit($this->description, 280));
    }

    public function getImageAttribute()
    {
//        dd($this->images);
        $img = 'https://www.steaua-dunarii.ro/client/img/image-not-found.png';
        if(count($this->images)) {
//            $img = $this->images[0]->link;
            $img = asset('storage/excursion'.$this->images[0]->link);
        }
        return $img;
    }

    public function getNearExcursionAttribute()
    {
        return $this->schedules()->where('time', '>', time())->orderBy('time', 'ASC')->first()->customDate ?? 'Нет данных';
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
