<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Slide extends Model
{
    use HasFactory;

    protected $table = 'slides';
    protected $fillable = ['image', 'link'];

    public static function createTable()
    {
        if (!Schema::hasTable('slides')) {
            Schema::create('slides', function (Blueprint $table) {
                $table->id();
                $table->string('image', 255);
                $table->string('link', 255)->nullable();
                $table->timestamps();
            });
        }
    }
}
