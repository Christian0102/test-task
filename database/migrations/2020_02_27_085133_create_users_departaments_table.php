<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDepartamentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->down();
        Schema::create('users_departaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('departament_id');
            $table->unique(['user_id', 'departament_id']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('departament_id')->references('id')->on('departaments');
            $table->dropForeign(['user_id']);
            $table->dropForeign(['departament_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users_to__departaments');
    }

}
