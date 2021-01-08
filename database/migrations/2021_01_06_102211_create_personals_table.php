<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->string('name');
            $table->string('fname');
            $table->string('email');
            $table->string('mobile');
            $table->string('gender');
            $table->string('dob');
            $table->string('addressa');
            $table->string('addressb');
            $table->string('landmark');
            $table->string('state');
            $table->string('district');
            $table->string('pincode');
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
        Schema::dropIfExists('personals');
    }
}
