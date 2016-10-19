<?php

namespace AppBundle\Repository;
 
use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * Description of TicketDistributionRepository
 *
 * @author Ignacio
 */
class TicketDistributionRepository extends DocumentRepository
{
    public function findAllOrderedByDistributed()
    {
        return $this->createQueryBuilder()
            ->sort('distributed', 'ASC')
            ->getQuery()
            ->execute();
    }
    
    public function findMinDistributed()
    {
        return $this->createQueryBuilder()
            ->sort('distributed', 1) //ASC
            ->getQuery()
                
            ->execute();
        
    }

}
