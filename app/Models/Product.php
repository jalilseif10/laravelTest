<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'img','category_id'
    ];

    /**
     * Get the properties for the product.
     */
    public function productProperties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductProperty::class);
    }

    /**
     * Get the category of product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
