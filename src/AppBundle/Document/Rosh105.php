<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Rosh105 
{
    
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $UEIgamer;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $lastTestPassed;
    
    /**
     * @MongoDB\Field(type="int")
     */
    protected $lockedAt;

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
     * Set uEIgamer
     *
     * @param string $uEIgamer
     * @return $this
     */
    public function setUEIgamer($uEIgamer)
    {
        $this->UEIgamer = $uEIgamer;
        return $this;
    }

    /**
     * Get uEIgamer
     *
     * @return string $uEIgamer
     */
    public function getUEIgamer()
    {
        return $this->UEIgamer;
    }

    /**
     * Set lastTestPassed
     *
     * @param string $lastTestPassed
     * @return $this
     */
    public function setLastTestPassed($lastTestPassed)
    {
        $this->lastTestPassed = $lastTestPassed;
        return $this;
    }

    /**
     * Get lastTestPassed
     *
     * @return string $lastTestPassed
     */
    public function getLastTestPassed()
    {
        return $this->lastTestPassed;
    }

    /**
     * Set lockedAt
     *
     * @param int $lockedAt
     * @return $this
     */
    public function setLockedAt($lockedAt)
    {
        $this->lockedAt = $lockedAt;
        return $this;
    }

    /**
     * Get lockedAt
     *
     * @return int $lockedAt
     */
    public function getLockedAt()
    {
        return $this->lockedAt;
    }
}
