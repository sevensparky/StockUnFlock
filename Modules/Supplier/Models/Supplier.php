<?php

namespace Modules\Supplier\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Product\Models\Product;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'mobile_no', 'email', 'address', 'status', 'created_by', 'updated_by'
    ];


    /**
     * convert status record to persian
     *
     * @return string
     */
    public function getStatusToPersianAttribute(): string
    {
        return $this->status == "active" ? 'فعال' : 'غیر فعال';
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
