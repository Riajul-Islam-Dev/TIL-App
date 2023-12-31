<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuLinksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('menu_links', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id')->unique()->required();
            $table->string('menu_name')->unique()->required();
            $table->string('menu_type')->required();
            $table->string('url')->unique()->required();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
        });

        // Add a foreign key constraint to link each menu link to its parent
        Schema::table('menu_links', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('menu_links')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('menu_links', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
        });

        Schema::dropIfExists('menu_links');
    }
}
