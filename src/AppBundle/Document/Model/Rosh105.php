<?php

namespace AppBundle\Document\Model;

use AppBundle\Services\rosh\Rosh;

class Rosh105 
{
        
    public function createUser($UEIgamer, $ticket, $testsPassed=null, $unlockAt=null)
    {
        if ($testsPassed == null){
            $testsPassed = $this->getTests();
        }
        
        $this
                ->setUeigamer($UEIgamer)
                ->setTestsPassed($testsPassed)
                ->setUnlockAt($unlockAt)
                ->setTicket($ticket)
//                ->setCreatedAt()
        ;
    }

    public function setsuccessfulTest($test)
    {
        $this->checkTest($test);
        
        $tests = $this->getTestsPassed();   
        $tests[$test] = true;
        
        $this->setTestsPassed($tests);
    }
    
    public function checkTest($test)
    {
        $tests = $this->getTests();
        
        if (!array_key_exists($test, $tests)) {
            throw new \Exception(sprintf('Test %s not exists', $test));
        }
    }
    
    public function getTests()
    {
        return [
            Rosh::UPDATE_105_PARCHMENT  => false,
            Rosh::UPDATE_105_NOT_PASS   => false,
            Rosh::UPDATE_105_THE_HIDEN  => false,
            Rosh::UPDATE_105_TICKETS    => false
        ];
    }
    
}
