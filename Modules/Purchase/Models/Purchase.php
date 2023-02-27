<?php

namespace Modules\Purchase\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Models\Category;
use Modules\Product\Models\Product;
use Modules\Supplier\Models\Supplier;

class Purchase extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'supplier_id', 'category_id', 'product_id', 'purchase_no', 'slug',
        'date', 'description', 'buying_quantity', 'unit_price', 'buying_price',
        'status', 'created_by', 'updated_by',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'purchase_no'
            ]
        ];
    }

    /**
     * convert status record to persian
     *
     * @return string
     */
    public function getStatusToPersianAttribute(): string
    {
        return $this->status == "approved" ? 'تایید شده' : 'در حال بررسی';
    }


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
