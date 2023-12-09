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
        Schema::table('rooms', function (Blueprint $table) {
            $table->text('meta_tags')->nullable()->after('description');
            $table->text('meta_description')->nullable()->after('description');
            $table->string('meta_title')->nullable()->after('description');
            $table->string('video')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_tags');
            $table->dropColumn('meta_description');
        });
    }
};
