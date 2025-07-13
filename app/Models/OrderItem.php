<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderItem
 *
 * @property $id
 * @property $order_id
 * @property $product_id
 * @property $quantity
 * @property $price
 * @property $created_at
 * @property $updated_at
 *
 * @property Order $order
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrderItem extends Model
{
    
    static $rules = [
		'order_id' => 'required',
		'product_id' => 'required',
		'quantity' => 'required',
		'price' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'order_items';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id','product_id','quantity','price'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'id', 'order_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    

}
