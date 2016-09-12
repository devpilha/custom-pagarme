<?php

namespace PagarMe\Sdk;

use PagarMe\Sdk\Request;

interface Request
{
    public function getPayload();
    public function getPath();
    public function getMethod();
}
