<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'investments';

    /**
     * Kolom yang dapat diisi.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'amount', 'expected_return', 'status'
        // Sesuaikan dengan kolom-kolom yang ada pada tabel investments di database Anda
    ];

    /**
     * Mendapatkan nasabah yang memiliki investasi ini.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
