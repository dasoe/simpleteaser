<?php

namespace DasOe\SimpleTeaser\Domain\Repository;

/*
 * This file is part of the DasOe.SimpleTeaser package.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\Doctrine\Repository;

/**
 * @Flow\Scope("singleton")
 */
class TeaserRepository extends Repository {

    public function getRandom() {
        $rows = $this->createQuery()->execute()->count();
        $row_number = mt_rand(0, max(0, ($rows - 1)));
        return $this->createQuery()->setOffset($row_number)->setLimit(1)->execute();
    }

    /**
     * Fetch random teasers
     *
     * @param integer $number 
     * @return void
     */
    public function getRandomEntities(int $number) {

        // not too many teasers will be there, so easy and fast(?) random approach:
        $queryGetIds = 'SELECT t.Persistence_Object_Identifier FROM DasOe\SimpleTeaser\Domain\Model\Teaser t';
        $queryGetIdsQ = $this->entityManager->createQuery($queryGetIds);

        $idArray = $queryGetIdsQ->execute();
        shuffle($idArray);
        $idList = '';
        for ($i = 0; $i < $number; $i++) {
            $idList .= '\'' . $idArray[$i]['Persistence_Object_Identifier'] . '\',';
        }
        unset($idArray);
        $idListTrimmed = trim($idList, ',');

        // $query = 'SELECT t FROM DasOe\SimpleTeaser\Domain\Model\Teaser t WHERE t.Persistence_Object_Identifier IN (\'b387bf8b-1745-4864-84b7-6afefef3248b\')';
        $query = 'SELECT t FROM DasOe\SimpleTeaser\Domain\Model\Teaser t WHERE t.Persistence_Object_Identifier IN (' . $idListTrimmed . ')';

        $query = $this->entityManager->createQuery($query);

        return $query->execute();
    }

}
