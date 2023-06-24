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
        Schema::table('ficha_children', function (Blueprint $table) {
            //
            $table->foreignId('children_id')->references('id')->on('childrens')->constrained()->onDelete('cascade');
            $table->date('fec_ingreso');
            $table->date('fec_salida');
            $table->string('objetivos');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ficha_children', function (Blueprint $table) {
            //
            $table->dropColumn('children_id');
            $table->dropForeign('chidren_id_foreing');
            $table->dropColumn('fec_ingreso');
            $table->dropColumn('fec_salida');
            $table->dropColumn('objetivos');
            $table->dropColumn('description');
        });
    }
};
