<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'remember_token'];

    public static function createTable()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->string('email', 100)->unique();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }
}
