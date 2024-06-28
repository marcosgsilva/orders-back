<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'status', // adicione outros campos fillable conforme necessário
        'customer_name',
        'description',
        'quantity'
        // outros campos fillable aqui
    ];

    use HasFactory;
}
