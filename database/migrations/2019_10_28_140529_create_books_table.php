<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name', 80)->nullable(false);
            // AS 'ON DELETE NO ACTION': do note use ->onDelete()
            // AS 'ON UPDATE NO ACTION': do note use ->onUpdate()
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->text('review');
            $table->string('edition')->default(null);
            $table->timestamp('published_at')->nullable(false);
            $table->string('isbn')->default(null);
            $table->integer('copies')->nullable(false)->default(1);
            $table->text('location', 6)->nullable(false);
            $table->string('cover', 5)->nullable(false);
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