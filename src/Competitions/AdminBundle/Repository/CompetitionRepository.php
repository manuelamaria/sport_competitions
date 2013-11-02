<?php

//
// Copyright Kanguru Solutions
// All rights reserved.
// 

namespace Competitions\AdminBundle\Repository;

use Doctrine\ORM\EntityRepository;


class CompetitionRepository extends EntityRepository {
    
    public function findByFilter($categories) {
        $date = new \DateTime();
        $timestamp = $date->format('Y-m-d');
        
        $qb = $this->createQueryBuilder('c');
        for($i = 0; $i < count($categories); $i++) {
             $qb->orWhere(':category_' . $i. ' member of c.categories')->setParameter('category_' . $i, $categories[$i]);
        }
       
        $qb->andWhere(' DATEDIFF(c.start_date, :today) >= 0 ')->setParameter('today', $timestamp);
        $qb->addOrderBy('c.start_date');
        
        $query = $qb->getQuery();
        $result = $query->getResult();
        return $result;
    }
}

?>
