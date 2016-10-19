<?php

namespace AppBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Document\TicketDistribution;

/**
 * Description of LoadTicketDistributionData
 *
 * @author Ignacio
 */
class LoadTicketDistributionData  implements FixtureInterface
{
    private $manager;
    
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $tickets = $this->getTickets();
        
        foreach ($tickets as $ticket_a => $ticket_b) {
            $this->newTicketDistribution($ticket_a, $ticket_b);
            $this->newTicketDistribution($ticket_b, $ticket_a);
        }
        
    }
    
    private function newTicketDistribution($ticket, $pair)
    {
        $ticketDist = new TicketDistribution();
        $ticketDist->setTicket($ticket);
        $ticketDist->setPair($pair);
        $ticketDist->setDistributed(0);
        
        $this->manager->persist($ticketDist);
        $this->manager->flush();
    }
    
    private function getTickets()
    {
        return [
            '7726'  => '68055',
            '15052' => '01145',
            '31245' => '78569',
            '34305' => '22765',
            '09779' => '23691',
            '45123' => '89567',
            '40475' => '52437',
            '79845' => '32788',
            '26747' => '52326',
            '12377' => '56500',
            '61816' => '34851',
            '48151' => '62342',
            '96340' => '91736',
            '14102' => '00161',
            '46015' => '90210',
            '10205' => '14053',
            '46910' => '23825',
            '25051' => '97989',
            '06061' => '93956',
            '12345' => '56789'                        
        ];
    }
    
}
