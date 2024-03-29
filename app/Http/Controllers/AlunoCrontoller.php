<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Response;
use App\Http\Requests\AlunoRequest;
use App\Http\Resources\AlunoCollection;
use App\Http\Resources\AlunoResource;
use Illuminate\Database\Eloquent\Collection;

class AlunoCrontoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AlunoCollection
     */
    public function index(): AlunoCollection
    {
        return new AlunoCollection(
            Aluno::with('turma')->paginate(2)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AlunoRequest $request
     * @return Response
     */
    public function store(AlunoRequest $request): Response
    {
        return response(
            Aluno::create($request->all()),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Aluno $aluno
     * @return AlunoResource
     */
    public function show(Aluno $aluno): AlunoResource
    {
        return new AlunoResource($aluno);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AlunoRequest $request
     * @param Aluno $aluno
     * @return Aluno
     */
    public function update(AlunoRequest $request, Aluno $aluno): Aluno
    {
        $aluno->update($request->all());

        return $aluno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Aluno $aluno
     * @return Array
     */
    public function destroy(Aluno $aluno): Array
    {
        $aluno->delete();

        return [];
    }
}
