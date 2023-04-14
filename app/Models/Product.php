<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'manufacturer_id',
    ];

    protected $casts = [
        'price' => 'decimal',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
