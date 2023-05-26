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
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->binary('picture');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->double('price');
            $table->boolean('statut')->default(1);
            $table->unsignedBigInteger('categorie_id');
            $table->timestamps();

            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            Schema::enableForeignKeyConstraints();
            $table->dropForeign(['categorie_id']);
            Schema::dropIfExists('produits');
        });
    }
};
