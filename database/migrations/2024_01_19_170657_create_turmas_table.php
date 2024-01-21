<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 100);
            $table->timestamps();
        });

        DB::table('turmas')->insert([
            ['descricao' => 'Turma de PHP'],
            ['descricao' => 'Turma de Mysql'],
            ['descricao' => 'Turma de JavaScript']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turmas');
    }
};
