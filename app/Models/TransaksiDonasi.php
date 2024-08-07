<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDonasi extends Model
{
    use HasFactory;

    protected $table = 'transaksi_donasi';
    protected $primaryKey = 'id_transaksi';
    protected $nullable = ['dukungan'];
    protected $guarded = [];
}
