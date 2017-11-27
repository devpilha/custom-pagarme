<?php

namespace PagarMe\Sdk\AntifraudAnalysis;

class AntifraudAnalysis
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $cost;

    /**
     * @var \DateTime
     */
    public $dateCreated;

    /**
     * @var \DateTime
     */
    public $dateUpdated;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $score;

    /**
     * @var string
     */
    public $status;

    /**
     * @param array $antifraudAnalysisData
     */
    public function __construct($antifraudAnalysisData)
    {
        $this->fill($antifraudAnalysisData);
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return \DateTime
     * @codeCoverageIgnore
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @return \DateTime
     * @codeCoverageIgnore
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getStatus()
    {
        return $this->status;
    }
}
