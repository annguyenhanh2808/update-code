<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('file_dinh_kem')->nullable(true);
            $table->string('phone_number')->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->date('date_of_birth')->nullable(true)->default(now());
            $table->text('about_us')->nullable(true);
            $table->string('education')->nullable(true);
            $table->string('expirence_work')->nullable(true);
            $table->string('skills')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
