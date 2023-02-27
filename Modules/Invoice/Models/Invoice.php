<?php

namespace Modules\Invoice\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Customer\Models\Customer;
use Modules\Invoice\Models\Payment;

class Invoice extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'invoice_no', 'slug', 'date', 'description', 'status', 'created_by', 'updated_by'
    ];

    // protected $guarded = [];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'invoice_no'
            ]
        ];
    }


    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
