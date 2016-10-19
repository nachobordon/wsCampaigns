<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;
use AppBundle\Document\Model\Rosh105 as Rosh105Model;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ODM\MongoDB\Mapping\Annotations\HasLifecycleCallbacks;

/**
 * @MongoDB\Document
 * @MongoDBUnique(fields="ueigamer")
 * @ORM\HasLifecycleCallbacks()
 */
class Rosh105 extends Rosh105Model
{
    
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     */
    protected $ueigamer;

    /**
     * @MongoDB\Field(type="hash")
     */
    protected $testsPassed;
    
    /**
     * @MongoDB\Field(type="int")
     */
    protected $unlockAt;
        
    /**
     *
     * @MongoDB\Field(type="string")
     */
    protected $ticket;
    
    /**
     *
     * @MongoDB\Field(type="string")
     */
    protected $allTestsPassedAt;
    
    /**
     *
     * @MongoDB\Field(type="string")
     */
    protected $createdAt;

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
     * Set ueigamer
     *
     * @param string $ueigamer
     * @return $this
     */
    public function setUeigamer($ueigamer)
    {
        $this->ueigamer = $ueigamer;
        return $this;
    }

    /**
     * Get ueigamer
     *
     * @return string $ueigamer
     */
    public function getUeigamer()
    {
        return $this->ueigamer;
    }

    /**
     * Set CreatedAt
     *
     * @return self
     */
    public function setCreatedAt()
    {
        $now = new \DateTime();
        $this->createdAt = $now->format('Y-m-d H:i:s');

        return $this;
    }

    /**
     * Get CreatedAt
     *
     * @return string $CreatedAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set testsPassed
     *
     * @param hash $testsPassed
     * @return $this
     */
    public function setTestsPassed($testsPassed)
    {
        $this->testsPassed = $testsPassed;
        return $this;
    }

    /**
     * Get testsPassed
     *
     * @return hash $testsPassed
     */
    public function getTestsPassed()
    {
        return $this->testsPassed;
    }

    /**
     * Set unlockAt
     *
     * @param int $unlockAt
     * @return $this
     */
    public function setUnlockAt($unlockAt)
    {
        $this->unlockAt = $unlockAt;
        return $this;
    }

    /**
     * Get unlockAt
     *
     * @return int $unlockAt
     */
    public function getUnlockAt()
    {
        return $this->unlockAt;
    }
    
    /**
    * @ORM\PrePersist
    * @ORM\PreUpdate
    */
    public function prePersist()
    {
      $this->createdAt = date('Y-m-d H:i:s');
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
     * Set allTestsPassedAt
     *
     * @param string $allTestsPassedAt
     * @return $this
     */
    public function setAllTestsPassedAt($allTestsPassedAt)
    {
        $this->allTestsPassedAt = $allTestsPassedAt;
        return $this;
    }

    /**
     * Get allTestsPassedAt
     *
     * @return string $allTestsPassedAt
     */
    public function getAllTestsPassedAt()
    {
        return $this->allTestsPassedAt;
    }
}
