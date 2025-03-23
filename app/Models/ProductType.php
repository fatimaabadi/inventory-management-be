<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\ItemProduct;
class ProductType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'count', 'image','user_id'];

   
    public function user()
{
    return $this->belongsTo(User::class);
}

public function items()
{
    return $this->hasMany(ItemProduct::class, 'product_type_id');
}

}

