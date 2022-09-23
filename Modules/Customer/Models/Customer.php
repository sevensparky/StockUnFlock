<?php

namespace Modules\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'image', 'mobile_no', 'email', 'address', 'status', 'created_by', 'updated_by'
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
}
