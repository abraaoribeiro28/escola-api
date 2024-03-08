<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlunoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->nome,
            'nascimento' => $this->nascimento,
            'genero' => $this->genero,
            'turma' => new TurmaResource($this->whenLoaded('turma')),
            'links' => [
                [
                    'type' => 'GET',
                    'url' => route('alunos.show', $this->id),
                    'rel' => 'aluno_detalhes'
                ],
                [
                    'type' => 'PUT',
                    'url' => route('alunos.update', $this->id),
                    'rel' => 'aluno_atualizar'
                ],
                [
                    'type' => 'DELETE',
                    'url' => route('alunos.destroy', $this->id),
                    'rel' => 'aluno_remover'
                ]
            ]
        ];
    }
}
