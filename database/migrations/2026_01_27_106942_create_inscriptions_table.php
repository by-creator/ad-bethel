<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenom');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('nationalite');
            $table->enum('etat_civil', [
                'celibataire',
                'marie_sans_enfant',
                'marie_avec_enfant',
                'divorce'
            ]);
            $table->string('eglise');
            $table->date('date_conversion');
            $table->text('motivation');
            $table->enum('engagement', ['oui', 'non']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
