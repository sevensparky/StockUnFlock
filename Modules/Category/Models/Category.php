<?php

namespace Modules\Category\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'status', 'created_by', 'updated_by'
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


    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * convert status record to persian
     *
     * @return string
     */
    public function getStatusToPersianAttribute(): string
    {
        return $this->status == "active" ? 'فعال' : 'غیر فعال';
    }

}
