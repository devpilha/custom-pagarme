<?php

namespace PagarMe\Sdk\Transaction\Request;

use PagarMe\Sdk\RequestInterface;

class TransactionList implements RequestInterface
{
    /**
     * @var int
     */
    public $page;

    /**
     * @var int
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
        return 'transactions';
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return self::HTTP_GET;
    }
}
