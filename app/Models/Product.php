<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name', 'id_type', 'description', 'unit_price', 'promotion_price', 'image', 'unit', 'new'];

    public static function createTable()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_type');
                $table->string('name', 100);
                $table->text('description')->nullable();
                $table->decimal('unit_price', 10, 2);
                $table->decimal('promotion_price', 10, 2)->nullable();
                $table->string('image', 255)->nullable();
                $table->string('unit', 20);
                $table->boolean('new')->default(0);
                $table->timestamps();

                $table->foreign('id_type')->references('id')->on('type_products');
            });
        }
    }
}

