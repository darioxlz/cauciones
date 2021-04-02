<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individuals', function (Blueprint $table) {
            $table->bigIncrements('individual_id');
            $table->unsignedInteger('cedula')->unique()->nullable(false);
            $table->string('firstnames', 200)->nullable(false);
            $table->string('surnames', 200)->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->string('phone_number', 200)->nullable(true);
            $table->enum('sex', ['M', 'F'])->nullable(false);
            $table->unsignedBigInteger('address_id')->nullable(false);
            $table->date('created_at')->nullable(false);
            $table->date('updated_at')->nullable(true);
            $table->date('deleted_at')->nullable(true);
            $table->unsignedBigInteger('created_by')->nullable(false);


            $table->foreign('address_id')->references('address_id')->on('addresses');
//            $table->foreign('created_by')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individuals');
    }
}
