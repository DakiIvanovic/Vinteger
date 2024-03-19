<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToUploadPostsTable extends Migration
{
    public function up()
    {
        Schema::table('upload_posts', function (Blueprint $table) {
            if (!Schema::hasColumn('upload_posts', 'description')) {
                $table->text('description')->nullable(); 
            }
        });
    }

    public function down()
    {
        Schema::table('upload_posts', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
