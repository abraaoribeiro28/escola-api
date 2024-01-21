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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->date('nascimento');
            $table->char('genero', 1);
            $table->unsignedBigInteger('turma_id');
            $table->foreign('turma_id')
                ->references('id')
                ->on('turmas');
            $table->timestamps();
        });

        DB::table('alunos')->insert([
            [
                'nome' => 'Matheus Felipe',
                'nascimento' => date('Y-m-d'),
                'genero' => 'm',
                'turma_id' => 1,
            ],
            [
                'nome' => 'João Paulo',
                'nascimento' => date('Y-m-d'),
                'genero' => 'm',
                'turma_id' => 1,
            ],
            [
                'nome' => 'Ana Maria',
                'nascimento' => date('Y-m-d'),
                'genero' => 'f',
                'turma_id' => 2,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
