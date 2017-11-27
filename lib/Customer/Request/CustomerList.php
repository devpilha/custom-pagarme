<?php

namespace PagarMe\Sdk\Customer\Request;

use PagarMe\Sdk\RequestInterface;

class CustomerList implements RequestInterface
{
    /**
     * @var int | Página da listagem
     */
    public $page;

    /**
     * @var int | Quantidades de itens a retornar
     */
    public $count;

    /**
     * @param int $page
     * @param int $count
     */
    public function __construct($page, $count)
    {
        $this->page  = $page;
        $this->count = $count;
    }

    /**
     * @return array
     */
    public function getPayload()
    {
        return [
            'page'  => $this->page,
            'count' => $this->count,
        ];
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return 'customers';
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return self::HTTP_GET;
    }
}
