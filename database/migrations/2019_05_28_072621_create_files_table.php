<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');


            // Links the file to the project.
            $table->bigInteger('project_id');
            // This links the user to the file that was uploaded.
            // This is just to allow users to see all the files that they have uploaded.
            $table->bigInteger('user_id');
            // File's hash path
            $table->string('path')->nullable();
            // Original file name
            $table->string('file_name');
            // File extention
            $table->string('extension', 16);
            // Prevents database holes.
            $table->boolean('deleted')->default(false);


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
        Schema::dropIfExists('files');
    }
}
