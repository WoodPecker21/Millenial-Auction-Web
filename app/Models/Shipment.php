<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'shipment';
    protected $primaryKey = 'id_shipment';
    public $timestamps = false;
    protected $fillable = [
        'status',
        'harga',
        'jenis_shipment'
    ];
}
