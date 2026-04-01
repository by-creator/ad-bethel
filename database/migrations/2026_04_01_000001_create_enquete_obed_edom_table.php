<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enquete_obed_edom', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenom');
            $table->string('telephone');
            $table->text('propositions');
            $table->text('appreciations');
            $table->enum('dispo_presentiel', ['oui', 'non']);
            $table->text('commentaire_presentiel')->nullable();
            $table->text('sujets_defis');
            $table->enum('dispo_3e_culte', ['oui', 'non']);
            $table->text('incitation_3e_culte')->nullable();
            $table->enum('est_entrepreneur', ['oui', 'non']);
            $table->text('activite')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquete_obed_edom');
    }
};
