<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCautionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cautions', function (Blueprint $table) {
            $table->bigIncrements('caution_id');
            $table->unsignedInteger('file_id')->nullable(false);
            $table->string('image_path', 200)->nullable(false);
            $table->date('created_at')->nullable(false);
            $table->date('updated_at')->nullable(true);
            $table->date('deleted_at')->nullable(true);
            $table->unsignedInteger('created_by')->nullable(false);

            $table->foreign('file_id')->references('file_id')->on('files');
            $table->foreign('created_by')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cautions');
    }
}
