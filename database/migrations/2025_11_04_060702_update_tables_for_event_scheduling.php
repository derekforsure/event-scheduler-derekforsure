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
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
            $table->dropColumn(['date', 'time']);
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('participants');
            $table->renameColumn('user_id', 'organizer_id');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->time('open_time')->default('08:00');
            $table->time('close_time')->default('17:00');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('title', 'name');
            $table->date('date');
            $table->time('time');
            $table->dropColumn(['start_time', 'end_time', 'participants']);
            $table->renameColumn('organizer_id', 'user_id');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn(['open_time', 'close_time']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};