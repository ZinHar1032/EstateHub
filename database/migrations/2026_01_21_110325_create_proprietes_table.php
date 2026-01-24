<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proprietes', function (Blueprint $table) {
            $table->id();

            $table->string('titre');
            $table->text('description')->nullable();

            $table->decimal('prix', 10, 2);
            $table->integer('surface');

            $table->integer('nb_chambres')->nullable();
            $table->integer('nb_salle_bain')->nullable();

            $table->string('adresse');
            $table->string('ville');

            $table->boolean('parking')->default(false);

            // état du bien + validation admin
            $table->enum('statut', ['disponible', 'reserve', 'vendu'])->default('disponible');
            $table->boolean('valide')->default(false);

            // relations
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // agent
            $table->foreignId('type_propriete_id')->constrained('type_proprietes')->restrictOnDelete();
            $table->foreignId('categorie_propriete_id')->constrained('categorie_proprietes')->restrictOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proprietes');
    }
};
