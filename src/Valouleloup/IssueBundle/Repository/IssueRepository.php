<?php

namespace Valouleloup\IssueBundle\Repository;

use Doctrine\ORM\EntityRepository;

class IssueRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findAllMostRecent()
    {
        $qb = $this->createQueryBuilder('i')
            ->orderBy('i.updatedAt', 'DESC')
        ;

        return $qb->getQuery()->getResult();
    }
}