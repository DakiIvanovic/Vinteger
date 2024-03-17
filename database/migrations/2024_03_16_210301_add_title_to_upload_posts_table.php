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
        // Proveravamo da li kolona title već postoji pre dodavanja
        if (!Schema::hasColumn('upload_posts', 'title')) {
            Schema::table('upload_posts', function (Blueprint $table) {
                $table->string('title')->after('id'); // Dodajemo kolonu title nakon kolone id
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Ako želite da poništite ovu migraciju, možete ukloniti kolonu title
        // ali za potrebe ovog primera nećemo to uraditi
    }
};
