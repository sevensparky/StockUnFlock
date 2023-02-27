<?php

namespace Modules\Invoice\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Customer\Models\Customer;
use Modules\Invoice\Models\Invoice;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_id', 'customer_id', 'paid_status', 'paid_amount',
        'due_amount', 'total_amount', 'discount_amount'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

}
