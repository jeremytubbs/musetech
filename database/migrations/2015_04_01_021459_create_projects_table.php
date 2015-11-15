<?php

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
            $table->increments('id');
            $table->string('github_url')->unique();
            $table->string('name')->nullable();
            $table->string('owner')->nullable();
            $table->string('description')->nullable();
            $table->string('homepage')->nullable();
            $table->integer('stars')->nullable();
            $table->string('language')->nullable();
            $table->timestamp('last_updated')->nullable();
            $table->boolean('is_listed')->default(0);
            $table->string('twitter')->nullable();
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
        Schema::drop('projects');
    }
}
