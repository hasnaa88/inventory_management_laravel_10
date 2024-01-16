<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $attributes = [
        'total_amount' => 0.00,
    ];

  // Order.php
public function products()
{
    return $this->belongsToMany(Product::class)->withPivot('quantity');
}


    protected $fillable = ['customer_id', 'total_amount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
