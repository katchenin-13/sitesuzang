<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_updates', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
            $table->foreignId("user_id")->constrained("users")->onDelete(null);
            $table->foreignId("contenu_id")->constrained("contenus")->onDelete(null);
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   Schema::table('post_updates',function(Blueprint $table){
        $table->dropForeign("user_id");
        $table->dropForeign("contenu_id");
    });

        Schema::dropIfExists('post_updates');
    }
}
