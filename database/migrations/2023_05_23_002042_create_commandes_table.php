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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('produits');
            $table->string('quantities');
            $table->float('prixTotal');
            $table->integer('telephone');
            $table->integer('num_table')->nullable();
            $table->string('quartier')->nullable();
            $table->string('reference')->nullable();
            $table->date('date');
            $table->boolean('accepte')->default(0);
            $table->boolean('livre')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
