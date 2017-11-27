<?php

namespace PagarMe\Sdk\BulkAnticipation\Request;

use PagarMe\Sdk\RequestInterface;
use PagarMe\Sdk\Recipient\Recipient;

class BulkAnticipationList implements RequestInterface
{
    /**
     * @var Recipient
     */
    public $recipient;

    /**
     * @var int
     */
    public $count;

    /**
     * @var int
     */
    public $page;

    /**
     * @param  Recipient $recipient
     * @param  int $count
     * @param  int $page
     */
    public function __construct(
        Recipient $recipient,
        $page,
        $count
    ) {
        $this->recipient = $recipient;
        $this->page      = $page;
        $this->count     = $count;
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
        return sprintf(
            'recipients/%s/bulk_anticipations',
            $this->recipient->getId()
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return self::HTTP_GET;
    }
}
