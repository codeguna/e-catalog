<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CartItem
 *
 * @property $id
 * @property $user_id
 * @property $product_id
 * @property $quantity
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CartItem extends Model
{

  static $rules = [
    'user_id' => 'required',
    'product_id' => 'required',
    'quantity' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'cart_items';
  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['user_id', 'product_id', 'quantity'];

  public function product()
  {
    return $this->belongsTo('App\Models\Product');
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
