<?php

namespace PagarMe\Sdk\Transfer\Request;

use PagarMe\Sdk\RequestInterface;

class TransferList implements RequestInterface
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
            'count' => $this->count
        ];
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return 'transfers';
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return self::HTTP_GET;
    }
}
