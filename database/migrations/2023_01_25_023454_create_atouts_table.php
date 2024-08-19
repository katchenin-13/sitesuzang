<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atouts', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('extrait');
            $table->text('contenu');
            
            // $table->string("imageUrl")->nullable();
            // $table->foreignId('user_id')
            // ->constrained()
            // ->onDelete('cascade')
            // ->onUpdate('cascade');
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
        Schema::dropIfExists('atouts');
    }
}
