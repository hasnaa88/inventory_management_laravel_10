<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Listen for the 'deleting' event on the Customer model
        static::deleting(function ($customer) {
            // Delete associated orders when deleting a customer
            $customer->orders()->delete();
        });
    }

}
