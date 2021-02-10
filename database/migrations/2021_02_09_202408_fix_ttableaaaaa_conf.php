<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixTtableaaaaaConf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conferences', function (Blueprint $table) {


            $table->string('webinar_id');
            $table->string('webinar_name');
            $table->string('webinar_password');
            $table->text('start_url');
            $table->boolean('started')->default(false);
            $table->boolean('is_active')->default(false);
            $table->boolean('finished')->default(false);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conferences', function (Blueprint $table) {
            //
        });
    }
}
