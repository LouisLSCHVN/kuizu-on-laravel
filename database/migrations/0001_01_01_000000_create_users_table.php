<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     /**
     - `id` -> **int** : Identifiant de l'utilisateur
     - `username` -> **varchar(255)** : Nom d'utilisateur
     - `password` -> **varchar(255)** : Mot de passe
     - `profile_picture` -> **varchar(255)** : Image de profil
     - `email` -> **varchar(255)** : Adresse email
     - `created_at` -> **timestamp** : Date de création
     - `updated_at` -> **timestamp** : Date de mise à jour
     - `verified` -> **boolean** : Compte vérifié / défault : `false`
     - `verification_token` -> **varchar(255)** : Token de vérification
     - `role` -> **enum('user', 'premium', 'admin')** : Rôle de l'utilisateur / défault : `user`
     - `bio` -> **text** : Biographie de l'utilisateur,
     - `last_login` -> **timestamp** : NULL DEFAULT NULL,
     - `pseudo_color` -> **varchar(7)** : DEFAULT NULL,
     */

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_picture')->nullable();
            $table->enum('role', ['user', 'premium', 'admin'])->default('user');
            $table->string('bio')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('pseudo_color')->default('#000000');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
