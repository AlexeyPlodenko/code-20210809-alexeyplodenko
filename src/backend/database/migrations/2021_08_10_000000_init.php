<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Init extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            'ALTER DATABASE `code`
            COLLATE "utf8mb4_unicode_520_ci"'
        );

        Schema::create('employees', function (Blueprint $table) {
            $table->json('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement(
            'ALTER DATABASE `code`
            COLLATE "latin1_swedish_ci"'
        );

        Schema::dropIfExists('employees');
    }
}
