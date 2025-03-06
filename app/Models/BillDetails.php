<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class BillDetails extends Model
{
    use HasFactory;

    protected $table = 'bill_details';
    protected $fillable = ['id_bill', 'id_product', 'quantity', 'unit_price'];

    public static function createTable()
    {
        if (!Schema::hasTable('bill_details')) {
            Schema::create('bill_details', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_bill');
                $table->unsignedBigInteger('id_product');
                $table->integer('quantity');
                $table->decimal('unit_price', 10, 2);
                $table->timestamps();

                $table->foreign('id_bill')->references('id')->on('bills');
                $table->foreign('id_product')->references('id')->on('products');
            });
        }
    }
}

