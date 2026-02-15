<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'loans';

    /**
     * Kolom yang dapat diisi.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'amount', 'interest_rate', 'term', 'status', 'loan_date'
        // Sesuaikan dengan kolom-kolom yang ada pada tabel loans di database Anda
    ];

    /**
     * Mendapatkan nasabah yang memiliki pinjaman ini.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
