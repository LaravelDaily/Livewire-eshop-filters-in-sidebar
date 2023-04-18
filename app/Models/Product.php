<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    const PRICES = [
        'Less than 50',
        'From 50 to 100',
        'From 100 to 500',
        'More than 500',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeWithFilters(Builder $query, array $prices, array $categories, array $manufacturers)
    {
        return $query->when(count($manufacturers), function (Builder $query) use ($manufacturers) {
            $query->whereIn('manufacturer_id', $manufacturers);
        })
            ->when(count($categories), function (Builder $query) use ($categories) {
                $query->whereIn('category_id', $categories);
            })
            ->when(count($prices), function (Builder $query) use ($prices){
                $query->where(function (Builder $query) use ($prices) {
                    $query->when(in_array(0, $prices), function (Builder $query) {
                        $query->orWhere('price', '<', '50');
                    })
                        ->when(in_array(1, $prices), function (Builder $query) {
                            $query->orWhereBetween('price', ['50', '100']);
                        })
                        ->when(in_array(2, $prices), function (Builder $query) {
                            $query->orWhereBetween('price', ['100', '500']);
                        })
                        ->when(in_array(3, $prices), function (Builder $query) {
                            $query->orWhere('price', '>', '500');
                        });
                });
            });
    }
}
