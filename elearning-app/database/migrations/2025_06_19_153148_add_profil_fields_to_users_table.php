<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
    if (!Schema::hasColumn('users', 'mapel')) {
        $table->string('mapel')->nullable();
    }
    if (!Schema::hasColumn('users', 'kelas')) {
        $table->string('kelas')->nullable();
    }
    if (!Schema::hasColumn('users', 'tanggal_lahir')) {
        $table->string('tanggal_lahir')->nullable();
    }
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
