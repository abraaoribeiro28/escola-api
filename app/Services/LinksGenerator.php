<?php

namespace App\Services;

class LinksGenerator
{
    /**
     * Guarda os links do hateoas
     *
     * @var array
     */
    protected array $links = [];

    /**
     * Adiciona um link no hateoas
     *
     * @param String $tipo
     * @param string $url
     * @param string $rel
     * @return void
     */
    protected function add(String $tipo, string $url, string $rel): void
    {
        $this->links[] = [
            'type' => $tipo,
            'url' => $url,
            'rel' => $rel
        ];
    }

    /**
     * Adiciona um link do tipo get
     *
     * @param string $url
     * @param string $rel
     * @return void
     */
    public function get(string $url, string $rel): void
    {
        $this->add('GET', $url, $rel);
    }

    /**
     * Adiciona um link do tipo post
     *
     * @param string $url
     * @param string $rel
     * @return void
     */
    public function post(string $url, string $rel): void
    {
        $this->add('POST', $url, $rel);
    }

    /**
     * Adiciona um link do tipo put
     *
     * @param string $url
     * @param string $rel
     * @return void
     */
    public function put(string $url, string $rel): void
    {
        $this->add('PUT', $url, $rel);
    }

    /**
     * Adiciona um link do tipo patch
     *
     * @param string $url
     * @param string $rel
     * @return void
     */
    public function patch(string $url, string $rel): void
    {
        $this->add('patch', $url, $rel);
    }

    /**
     * Adiciona um link do tipo delete
     *
     * @param string $url
     * @param string $rel
     * @return void
     */
    public function delete(string $url, string $rel): void
    {
        $this->add('DELETE', $url, $rel);
    }

    /**
     * Retorna um array com os links do hateoas
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->links;
    }
}
