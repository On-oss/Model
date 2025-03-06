<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = ['title', 'content', 'image'];

    public static function createTable()
    {
        if (!Schema::hasTable('news')) {
            Schema::create('news', function (Blueprint $table) {
                $table->id();
                $table->string('title', 255);
                $table->text('content');
                $table->string('image', 255)->nullable();
                $table->timestamps();
            });
        }
    }
}
