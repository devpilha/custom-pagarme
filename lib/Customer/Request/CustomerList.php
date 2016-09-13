<?php

namespace PagarMe\Sdk\Customer\Request;

use PagarMe\Sdk\Request;

class CustomerList implements Request
{
    private $page;
    private $count;

    public function __construct($page, $count)
    {
        $this->page  = $page;
        $this->count = $count;
    }

    public function getPayload()
    {
        return [
            'page'  => $this->page,
            'count' => $this->count,
        ];
    }

    public function getPath()
    {
        return 'customers';
    }

    public function getMethod()
    {
        return 'GET';
    }
}
