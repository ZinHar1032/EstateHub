<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rendez_vous_proprietes', function (Blueprint $table) {
            $table->id();

            // FK: client (user qui réserve)
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // FK: propriété réservée
            $table->foreignId('propriete_id')->constrained('proprietes')->cascadeOnDelete();

            // infos RDV
            $table->dateTime('date_visite');
            $table->text('commentaire')->nullable();

            $table->enum('statut', ['en_attente', 'confirme', 'annule', 'effectue'])
                ->default('en_attente');

            $table->timestamps();

            // évite 2 réservations du même bien au même créneau
            $table->unique(['propriete_id', 'date_visite']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rendez_vous_proprietes');
    }
};
