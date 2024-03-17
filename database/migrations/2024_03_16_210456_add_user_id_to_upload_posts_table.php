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
        $table->foreignId('user_id')->constrained()->onDelete('cascade')->after('description'); // Dodajemo kolonu user_id nakon kolone description
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
