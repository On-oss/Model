<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';
    protected $fillable = ['id_customer', 'date_order', 'total', 'payment', 'note'];

    public static function createTable()
    {
        if (!Schema::hasTable('bills')) {
            Schema::create('bills', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_customer');
                $table->date('date_order');
                $table->decimal('total', 10, 2);
                $table->string('payment', 50);
                $table->text('note')->nullable();
                $table->timestamps();

                $table->foreign('id_customer')->references('id')->on('customers');
            });
        }
    }
}

