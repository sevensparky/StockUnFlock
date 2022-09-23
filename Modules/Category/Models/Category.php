<?php

namespace Modules\Category\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Models\Subcategory;

class Category extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'link', 'status'
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
                'source' => 'title'
            ]
        ];
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }


    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * convert row status record to persian // TODO: clear grammar
     *
     * @return string
     */
    public function getStatusToPersianAttribute(): string
    {
        return $this->status == "active" ? 'فعال' : 'غیر فعال';
    }

}
