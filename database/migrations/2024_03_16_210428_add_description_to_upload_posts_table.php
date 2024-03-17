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
    Schema::table('upload_posts', function (Blueprint $table) {
        $table->text('description')->after('image'); // Dodajemo kolonu description nakon kolone image
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('upload_posts', function (Blueprint $table) {
            //
        });
    }
};
