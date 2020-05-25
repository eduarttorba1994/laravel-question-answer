<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            // Tittle in preaty URL
            $table->string("slug")->unique();
            $table->text("body");
            $table->unsignedInteger("views")->default(0); // when created question views are 0
            $table->unsignedInteger("answers")->default(0); // when created question views are 0
            $table->integer("votes")->default(0);
            $table->unsignedInteger("best_answer_id")->nullable();
            $table->bigInteger("user_id")->unsigned();
            $table->timestamps();

            // when the user is deleted all the questions related to that user will be deleted
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
