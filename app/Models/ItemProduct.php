<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductType;

class ItemProduct extends Model
{
    use HasFactory;
    protected $table = 'item_product'; // Table name

    protected $fillable = ['product_type_id', 'serial_number', 'sold'];

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

}
