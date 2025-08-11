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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedTinyInteger('usia')->nullable()->after('role');
            $table->string('pendidikan_terakhir')->nullable()->after('usia');
            $table->string('pekerjaan')->nullable()->after('pendidikan_terakhir');
            $table->unsignedTinyInteger('jumlah_melahirkan')->nullable()->after('pekerjaan');
            $table->unsignedTinyInteger('periode_postpartum')->nullable()->after('jumlah_melahirkan');
            $table->string('jenis_persalinan')->nullable()->after('periode_postpartum');
            $table->string('jenis_kelamin_bayi')->nullable()->after('jenis_persalinan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'usia',
                'pendidikan_terakhir',
                'pekerjaan',
                'jumlah_melahirkan',
                'periode_postpartum',
                'jenis_persalinan',
                'jenis_kelamin_bayi',
            ]);
        });
    }
};
