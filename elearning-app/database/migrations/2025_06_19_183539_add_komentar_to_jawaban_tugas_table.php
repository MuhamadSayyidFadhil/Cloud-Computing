<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('jawaban_tugas', function (Blueprint $table) {
        $table->text('komentar')->nullable()->after('nilai');
    });
}

public function down()
{
    Schema::table('jawaban_tugas', function (Blueprint $table) {
        $table->dropColumn('komentar');
    });
}

};
