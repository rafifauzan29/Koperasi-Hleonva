<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'phone',
        'address'
    ];

    public function mandatorySavings()
    {
        return $this->hasMany(MandatorySaving::class, 'customer_id');
    }
    public function loans()
    {
        return $this->hasMany(Loan::class, 'customer_id');
    }

    public function investments()
    {
        return $this->hasMany(Investment::class, 'customer_id');
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

}
