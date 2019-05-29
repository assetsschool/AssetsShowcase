<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Matches the user to the project
            $table->bigInteger('user_id');
            // Title of the project
            $table->string('title');
            // Description of the project
            $table->text('description')->nullable();
            // Date of the project
            $table->date('date');
            // The state of the project: pending, private, approved, etc.
            $table->string('state')->default('draft');

            $table->softDeletes();
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
        Schema::dropIfExists('projects');
    }
}
