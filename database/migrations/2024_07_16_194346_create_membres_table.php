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

        Schema::create('eglises', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->string('description')->nullable();
            $table->string('adresse_geo')->nullable();
            $table->foreignId('user_id')->nullable()->index();
            $table->timestamps();
        });
        //12 tribus connus. 
        // parametrage systeme des tribus
        Schema::create('tribus', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->string('description')->nullable();
            $table->timestamps();

        });

        /*Schema::create('eglise_tribu', function (Blueprint $table) {
            $table->foreignId('eglise_id')->nullable()->index();
            $table->foreignId('tribu_id')->nullable()->index();
        });*/
        
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->foreignId('tribu_id')->nullable()->index();
            $table->foreignId('eglise_id')->nullable()->index();
            $table->timestamp('date_entree_membre')->nullable();
            $table->string('lieu_habitation')->nullable();
            $table->enum('statut_bapteme',['N','O'])->default('N');
            $table->string('numero_cellulaire');
            $table->enum('statut_matrimonial', ['celibataire','fiance','marie'])->default('celibataire');
            $table->string('date_anniversaire')->nullable();
            $table->string('photo_path', 2048)->nullable();
            $table->foreignId('user_id')->nullable()->index();//celui qui a enregistré.
            $table->timestamps();
        });

        Schema::create('cultes', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description')->nullable();
            $table->string('heure_debut')->nullable();
            $table->string('heure_fin')->nullable();
            $table->foreignId('eglise_id')->nullable()->index();
            $table->foreignId('user_id')->nullable()->index();
            $table->timestamps();
        });

        Schema::create('attendances', function (Blueprint $table) {
            $table->timestamp('date_presence');
            $table->foreignId('eglise_id')->nullable()->index();
            $table->foreignId('culte_id')->nullable()->index();
            $table->foreignId('membre_id')->nullable()->index();
            $table->foreignId('user_id')->nullable()->index(); //celui qui a enregistré.
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eglises');
        Schema::dropIfExists('tribus');
        Schema::dropIfExists('membres');
        Schema::dropIfExists('cultes');
        Schema::dropIfExists('attendances');
        
    }
};
