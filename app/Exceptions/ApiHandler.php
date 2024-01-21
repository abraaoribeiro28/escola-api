<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

trait ApiHandler
{
    /**
     * Trata os erros personalizados
     *
     * @param Throwable $e
     * @return Response|false
     */
    public function tratarErros(Throwable $e): Response|false
    {
        if ($e instanceof ModelNotFoundException) {
            return $this->modelNotFoundException();
        }

        if ($e instanceof ValidationException) {
            return $this->validationException($e);
        }

        return false;
    }

    /**
     * Retorna o erro  quando não encontrar o registro
     *
     * @return Response
     */
    public function modelNotFoundException(): Response
    {
        return $this->respostaPadrao(
            'registro-nao-encontrado',
            'O sistema não encontrou o registro procurado.',
            404
        );
    }

    /**
     * Retorna o erro quando os dados são invalidos
     *
     * @param ValidationException $e
     * @return Response
     */
    public function validationException(ValidationException $e): Response
    {
        return $this->respostaPadrao(
            'erro-validacao',
            'Os dados enviados são invalidos.',
            400,
            $e->errors()
        );
    }

    /**
     * Retorna uma resposta com os campos padrão para os erros da api
     *
     * @param string $code
     * @param string $mensagem
     * @param integer $status
     * @param array|null $erros
     * @return Response
     */
    public function respostaPadrao(
        string $code,
        string $mensagem,
        int $status,
        array $erros = null
    ): Response
    {
        $dadosResposta = [
            'code' => $code,
            'message' => $mensagem,
            'status' => $status
        ];

        if ($erros) {
            $dadosResposta['erros'] = $erros;
        }

        return response($dadosResposta, $status);
    }
}
