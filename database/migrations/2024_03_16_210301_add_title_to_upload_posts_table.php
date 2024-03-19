<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('upload_posts', 'title')) {
            Schema::table('upload_posts', function (Blueprint $table) {
                $table->string('title')->after('id'); 
            });
        }
    }
    
    public function down(): void
    {

    }
};
