<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'id_type', 'description', 'unit_price', 'promotion_price', 'image', 'unit'];

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'id_type');
    }
    public function bill_detail()
    {
        return $this->hasMany(BillDetail::class, 'id_product');
    }
}
