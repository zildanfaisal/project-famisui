<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pretests', function (Blueprint $table) {
            // Hapus foreign key dulu
            $table->dropForeign(['video_id']);

            // Ubah tipe kolom ke JSON
            $table->json('video_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pretests', function (Blueprint $table) {
            // Kembalikan ke unsignedBigInteger dan foreign key
            $table->unsignedBigInteger('video_id')->nullable()->change();
            $table->foreign('video_id')->references('id')->on('videos')->nullOnDelete();
        });
    }
};
