<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
    ];

//    protected function name(): Attribute
//    {
//        return Attribute::make(
//            get: fn($value) => ucfirst($value),
//            set: fn($value) => ucwords($value),
//        );
//    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value)->diffForHumans();
        return $date;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
}
