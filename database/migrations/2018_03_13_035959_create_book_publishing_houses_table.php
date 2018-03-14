<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookPublishingHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_publishing_houses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            //создание поля для связывания с таблицей user
            $table->unsignedInteger('book_id')->unsigned();
            //создание внешнего ключа для поля 'book_id', который связан с полем id таблицы 'books'
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            //создание поля для связывания с таблицей user
            $table->unsignedInteger('publishing_house_id')->unsigned();
            //создание внешнего ключа для поля 'publishing_house_id', который связан с полем id таблицы 'publishing_houses'
            $table->foreign('publishing_house_id')->references('id')->on('publishing_houses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_publishing_houses');
    }
}
