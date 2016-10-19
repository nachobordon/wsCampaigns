<?php

namespace AppBundle\Services\rosh;

use Doctrine\ODM\MongoDB\DocumentManager;
use AppBundle\Document\Rosh105;
use AppBundle\Document\TicketDistribution;


/**
 * Description of TicketsManager
 *
 * @author Ignacio
 */
class TicketsManager
{
    /** @var DocumentManager */
    private $mongoManager;
    
    /**
     * 
     * @param DocumentManager $mongoManager
     */
    public function __construct(
        DocumentManager $mongoManager
    )
    {
        $this->mongoManager = $mongoManager;
    }

    
    public function checkUserPairOfTickets(Rosh105 $rosh105, $ticketToCheck)
    {
        $userTicket = $rosh105->getTicket(); //$this->getUserTicket($rosh105);        
        $ticketCouple = $this->findTicket($userTicket);
        
        return ($ticketCouple->getPair() == $ticketToCheck);
    }
    
    /**
     * 
     * @param type $ticket
     * @return TicketDistribution
     */
    public function findTicket($ticket)
    {
        return $this->getTicketRepository()->findOneBy([
            'ticket' => $ticket
        ]);
    }
    
    /**
     *      
     * @return TicketDistribution
     */
    public function getTicketForNewUser()
    {
        return $this->getTicketRepository()->findMinDistributed()->getSingleResult();
    }
    
    /**
     * 
     * @return \Doctrine\ODM\MongoDB\Repository\RepositoryFactory
     */
    public function getTicketRepository()
    {
        return $this->mongoManager->getRepository('AppBundle:TicketDistribution');
    }
}
