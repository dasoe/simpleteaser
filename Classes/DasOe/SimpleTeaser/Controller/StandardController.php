<?php

namespace DasOe\SimpleTeaser\Controller;

/*
 * This file is part of the DasOe.SimpleTeaser package.
 */

use TYPO3\Flow\Annotations as Flow;

class StandardController extends \TYPO3\Flow\Mvc\Controller\ActionController {

    /**
     * @var DasOe\SimpleTeaser\Domain\Repository\TeaserRepository
     * @Flow\Inject
     */
    protected $teaserRepository;

    /**
     * @return void
     * @Flow\SkipCsrfProtection
     */
    public function indexAction() {
        $teaserCount = $this->teaserRepository->findAll()->count();

        if ($teaserCount) {
            $teasers = $this->teaserRepository->getRandomEntities(6);

            $countLandscape = 0;
            foreach ($teasers as $oneTeaser) {
                if ($oneTeaser->getImage()->getWidth() / $oneTeaser->getImage()->getHeight() >= 1.3) {
                    // \TYPO3\FLOW\var_dump($oneTeaser->getImage()->getWidth() / $oneTeaser->getImage()->getHeight());
                    $countLandscape++;
                }
            }
            // take one away if too many lanscapes (we know that it will be not enough space then)
            if ($countLandscape > 4) {
                unset($teasers[0]);
            }
            $this->view->assign('teasers', $teasers);
        }
    }

}
