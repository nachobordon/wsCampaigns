<?php

namespace AppBundle\Document\Model;

/**
 * Description of TicketDistribution
 *
 * @author Ignacio
 */
class TicketDistribution
{
    public function addDistributed()
    {
        $distributedCount = $this->getDistributed();
        $distributedCount ++;
        
        $this->setDistributed($distributedCount);
    }
}
