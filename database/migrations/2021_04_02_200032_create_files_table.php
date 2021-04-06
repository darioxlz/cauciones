<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('file_id');
            $table->unsignedInteger('individual_id')->nullable(false);
            $table->unsignedInteger('misdeed_id')->nullable(false);
            $table->text('description')->nullable(false);
            $table->date('created_at')->nullable(false);
            $table->date('updated_at')->nullable(true);
            $table->date('deleted_at')->nullable(true);
            $table->unsignedInteger('created_by')->nullable(false);

            $table->foreign('individual_id')->references('individual_id')->on('individuals');
            $table->foreign('misdeed_id')->references('misdeed_id')->on('misdeeds');
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
        Schema::dropIfExists('files');
    }
}
