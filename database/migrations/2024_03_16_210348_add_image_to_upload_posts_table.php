<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToUploadPostsTable extends Migration
{
    public function up()
    {
        Schema::table('upload_posts', function (Blueprint $table) {
            if (!Schema::hasColumn('upload_posts', 'image')) {
                $table->string('image')->nullable(); 
            }
        });
    }

    public function down()
    {
        Schema::table('upload_posts', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
