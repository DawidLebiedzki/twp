<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('article_number_intern', 100);
            $table->string('article_number_customer', 100);
            $table->string('article_index', 100);
            $table->string('name', 100);
            $table->string('drawing_number', 100);
            $table->string('drawing_index', 100);
            $table->string('profil_number', 100);
            $table->integer('customer_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('articles', function (Blueprint $table) {

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
