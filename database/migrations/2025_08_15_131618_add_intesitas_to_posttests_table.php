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
        Schema::table('posttests', function (Blueprint $table) {
            $table->integer('intesitas_menyusui')->after('skor');
            $table->boolean('susu_formula')->after('intesitas_menyusui');
            $table->json('perawatan')->after('susu_formula');
            $table->text('kendala_menyusui')->nullable()->after('perawatan');
            $table->boolean('konsultasi_kendala')->after('kendala_menyusui');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posttests', function (Blueprint $table) {
            $table->dropColumn([
                'intesitas_menyusui',
                'susu_formula',
                'perawatan',
                'kendala_menyusui',
                'konsultasi_kendala',
            ]);
        });
    }
};
