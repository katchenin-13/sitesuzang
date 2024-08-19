<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiales', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('extrait');
            $table->text('contenu');
            $table->string('links1')->nullable();
            $table->string('links2')->nullable();
            $table->string('links3')->nullable();
            $table->string('links4')->nullable();
            $table->string("imageUrl")->nullable();
            // $table->foreignId('user_id')
            //     ->constrained()
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
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
        Schema::dropIfExists('filiales');
    }
}
