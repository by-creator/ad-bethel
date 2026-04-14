<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('enquete_obed_edom', function (Blueprint $table) {
            $table->text('lieu_sortie')->nullable()->after('activite');
        });
    }

    public function down(): void
    {
        Schema::table('enquete_obed_edom', function (Blueprint $table) {
            $table->dropColumn('lieu_sortie');
        });
    }
};
