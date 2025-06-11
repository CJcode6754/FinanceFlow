<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile')->after('password')->nullable();
            $table->string('auth_provider')->after('profile')->nullable();
            $table->string('auth_provider_id')->after('auth_provider')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile');
            $table->dropColumn('auth_provider');
            $table->dropColumn('auth_provider_id');
        });
    }
};
