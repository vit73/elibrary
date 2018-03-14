<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration,
    Illuminate\Support\Facades\DB;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned()->index();
            $table->string('name');
            $table->text('description');
            //создание поля для связывания с таблицей authors
            $table->integer('author_id')->unsigned()->nullable();
            //создание внешнего ключа для поля 'author_id', который связан с полем id таблицы 'authors'
            $table->foreign('author_id')->references('id')->on('authors')->onDelete(DB::raw('set null'));
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
        Schema::dropIfExists('books');
    }
}
