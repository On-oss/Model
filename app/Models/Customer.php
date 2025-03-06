<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers'; 
    protected $fillable = ['name', 'gender', 'email', 'address', 'phone_number', 'note'];

    public static function createTable()
    {
        if (!Schema::hasTable('customers')) {
            Schema::create('customers', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->string('gender', 10);
                $table->string('email', 50)->unique();
                $table->string('address', 100);
                $table->string('phone_number', 20);
                $table->text('note')->nullable();
                $table->timestamps();
            });
        }
    }
}
