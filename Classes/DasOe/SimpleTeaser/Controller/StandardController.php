<?php
namespace DasOe\SimpleTeaser\Controller;

/*
 * This file is part of the DasOe.SimpleTeaser package.
 */

use TYPO3\Flow\Annotations as Flow;


class StandardController extends \TYPO3\Flow\Mvc\Controller\ActionController
{

    /**
    * @var DasOe\SimpleTeaser\Domain\Repository\TeaserRepository
    * @Flow\Inject
    */
    protected $teaserRepository;
    
    /**
     * @return void
     */
    public function indexAction()
    {
        $teasers = $this->teaserRepository->getRandomEntities(3);
        $this->view->assign('teasers', $teasers);

    }

}
