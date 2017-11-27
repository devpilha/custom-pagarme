<?php

namespace PagarMe\Sdk\BulkAnticipation\Request;

use PagarMe\Sdk\RequestInterface;
use PagarMe\Sdk\Recipient\Recipient;

class BulkAnticipationLimits implements RequestInterface
{
    use \PagarMe\Sdk\MicrosecondsFormatter;

    /**
     * @var  Recipient
     */
    public $recipient;

    /**
     * @var  DateTime
     */
    public $paymentDate;

    /**
     * @var  string
     */
    public $timeframe;

    /**
     * @param  Recipient $recipient
     * @param  \DateTime $paymentDate
     * @param  string $timeframe
     */
    public function __construct(
        Recipient $recipient,
        \DateTime $paymentDate,
        $timeframe
    ) {
        $this->recipient       = $recipient;
        $this->paymentDate     = $paymentDate;
        $this->timeframe       = $timeframe;
    }

    /**
     * @return array
     */
    public function getPayload()
    {
        return [
            'payment_date'     => $this->getDateInMicroseconds(
                $this->paymentDate
            ),
            'timeframe'        => $this->timeframe
        ];
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return sprintf(
            'recipients/%s/bulk_anticipations/limits',
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
