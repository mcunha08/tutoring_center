<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('majors');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('profile_picture');
            $table->dropColumn('availability');

        });
        Schema::table('users', function (Blueprint $table) {
        $table->string('majors')->nullable()->default(null);
        $table->date('date_of_birth')->nullable()->default(null);
        $table->string('profile_picture')->nullable()->default(null);
        $table->string('availability')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
