<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class TypeProduct extends Model
{
    use HasFactory;

    protected $table = 'type_products';
    protected $fillable = ['name', 'description', 'image'];

    public static function createTable()
    {
        if (!Schema::hasTable('type_products')) {
            Schema::create('type_products', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->text('description')->nullable();
                $table->string('image', 255)->nullable();
                $table->timestamps();
            });
        }
    }
}

