<?php

namespace App\Http\Resources;

use App\Services\LinksGenerator;
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
        $links = new LinksGenerator();
        $links->get(route('alunos.show', $this->id), 'aluno_detalhes');
        $links->put(route('alunos.update', $this->id), 'aluno_atualizar');
        $links->delete(route('alunos.destroy', $this->id), 'aluno_remover');

        return [
            'nome' => $this->nome,
            'nascimento' => $this->nascimento,
            'genero' => $this->genero,
            'turma' => new TurmaResource($this->whenLoaded('turma')),
            'links' => $links->toArray()
        ];
    }
}
