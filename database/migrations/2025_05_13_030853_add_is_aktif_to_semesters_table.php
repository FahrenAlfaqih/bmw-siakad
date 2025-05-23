<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('semesters', function (Blueprint $table) {
            $table->boolean('is_aktif')->default(false);
        });
    }

    public function down()
    {
        Schema::table('semesters', function (Blueprint $table) {
            $table->dropColumn('is_aktif');
        });
    }
};
