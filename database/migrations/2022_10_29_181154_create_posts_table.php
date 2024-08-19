<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->text("extrait");
            $table->text('contenu')->nullable();
            $table->string('imageUrl')->nullable();
            $table->foreignId("categorie_id")->constrained()->onDelete(null);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
        {
            Schema::table("posts", function(Blueprint $table){
                $table->dropForeign("categorie_id");
            });
        Schema::dropIfExists('posts');
    }
}
