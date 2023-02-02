<?php

namespace App\Models;

use App\Jobs\ProductCreated;
use App\Jobs\ProductUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'likes', 'image'
    ];

    protected static function boot(){
        parent::boot();

        self::created(fn($product) => ProductCreated::dispatch($product->toArray()));
        self::updated(fn($product) => ProductUpdated::dispatch($product->toArray()));
    }
}
