<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Создание таблицы категорий
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->timestamps();
        });

        /**
         * Добавление категорий
         */
        DB::table('categories')->insert([
            ['name' => 'Видеокарта', 'link' => 'video-card'],
            ['name' => 'Оперативная память', 'link' => 'ram'],
            ['name' => 'Материнская плата', 'link' => 'motherboard'],
            ['name' => 'HDD', 'link' => 'hdd'],
            ['name' => 'Процессор', 'link' => 'processor'],
            ['name' => 'Блок питания', 'link' => 'power-supply'],
            ['name' => 'SSD', 'link' => 'ssd'],
            ['name' => 'Корпус', 'link' => 'case'],
            ['name' => 'Прочее', 'link' => 'other'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
