<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MandatorySaving extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'customer_id', 'amount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
