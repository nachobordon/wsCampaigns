<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Document\Model\TicketDistribution as TicketDistributionModel;


/**
 * @MongoDB\Document
 *
 */
class TicketDistribution extends TicketDistributionModel
{
    
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     */
    protected $ticket;
    
    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     */
    protected $pair;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $distributed;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ticket
     *
     * @param string $ticket
     * @return $this
     */
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;
        return $this;
    }

    /**
     * Get ticket
     *
     * @return string $ticket
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Set distributed
     *
     * @param int $distributed
     * @return $this
     */
    public function setDistributed($distributed)
    {
        $this->distributed = $distributed;
        return $this;
    }

    /**
     * Get distributed
     *
     * @return int $distributed
     */
    public function getDistributed()
    {
        return $this->distributed;
    }

    /**
     * Set pair
     *
     * @param string $pair
     * @return $this
     */
    public function setPair($pair)
    {
        $this->pair = $pair;
        return $this;
    }

    /**
     * Get pair
     *
     * @return string $pair
     */
    public function getPair()
    {
        return $this->pair;
    }
}
