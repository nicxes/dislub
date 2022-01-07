<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['organization_id', 'comments'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function ordersProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
}