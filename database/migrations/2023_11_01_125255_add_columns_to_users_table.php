<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_id')->after('id')->unique();
            $table->string('user_type')->after('name');
            $table->string('company_id')->after('user_type');
            $table->string('menu_permitted')->after('company_id');
            $table->tinyInteger('status')->after('menu_permitted')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('user_type');
            $table->dropColumn('company_id');
            $table->dropColumn('menu_permitted');
            $table->dropColumn('status');
        });
    }
}
