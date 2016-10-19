<?php

namespace AppBundle\Services\rosh;

use Doctrine\ODM\MongoDB\DocumentManager;
use AppBundle\Document\Rosh105;
use AppBundle\Services\rosh\TicketsManager;


/**
 * Description of Up105Manager
 *
 * @author Ignacio
 */
class Up105Manager
{
    const PARCHMENT_ANSWER_ES = 'ASMARARESISTE'; //pergamino
    const PARCHMENT_ANSWER_EN = 'ASMARARESISTS'; //pergamino
    const YOUCANNOTPASS_ANSWER = 1467;
    const THEHIDDEN_ANSWER = '';

    /** @var DocumentManager */
    private $mongoManager;
    /** @var TicketsManager */
    private $ticketsManager;

    /**
     * 
     * @param DocumentManager $mongoManager
     * @param TicketsManager  $ticketsManager
     */
    public function __construct(
        DocumentManager $mongoManager, 
        TicketsManager $ticketsManager
    )
    {
        $this->mongoManager = $mongoManager;
        $this->ticketsManager = $ticketsManager;
    }
    
    /**
     * 
     * @param string $UEIgamer
     * @return Rosh105
     */
    public function getUserData($UEIgamer)
    {
        return $this->mongoManager->getRepository('AppBundle:Rosh105')->findOneBy([
            'ueigamer' => $UEIgamer
        ]);
    }
    
    public function createUser($UEIgamer)
    {
        $ticket = $this->ticketsManager->getTicketForNewUser();
        $rosh105 = new Rosh105();
        $rosh105->createUser($UEIgamer, $ticket->getTicket());
        $this->save($rosh105);        
        $ticket->addDistributed();
        $this->save($ticket);
        
        return $rosh105;
    }
    
    public function parchmentAnswerChecker($answer)
    {
        $answer = str_replace(' ', '', $answer);
        
        if (strcasecmp($answer, self::PARCHMENT_ANSWER_ES) == 0 ||
            strcasecmp($answer, self::PARCHMENT_ANSWER_EN) == 0) {
            return true;
        }
        
        return false;
    }
    
    public function youCanNotPassAnswerChecker($answer)
    {
        if ($answer == self::YOUCANNOTPASS_ANSWER) {
            return true;
        }
        
        return false;
    }
    
    public function theHiddenAnswerChecker($answer)
    {
        if ($answer == self::THEHIDDEN_ANSWER) {
            return true;
        }
        
        return false;
    }
    
    public function ticketsAnswerChecker(Rosh105 $rosh105, $answer)
    {
        
        return $this->ticketsManager->checkUserPairOfTickets($rosh105, $answer);
    }
    
    
    public function setUserTestsPassed(Rosh105 $rosh105, $test)
    {        
        if($rosh105){
            $rosh105->setsuccessfulTest($test);
            $this->save($rosh105);

            return $rosh105;
        }
    }
    
    private function save($entity)
    {
        $this->mongoManager->persist($entity);
        $this->mongoManager->flush();
    }
}
