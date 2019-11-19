<?php
namespace DasOe\SimpleTeaser\Controller;

/*
 * This file is part of the Oe.SimpleTeaserTest package.
 */

use TYPO3\Flow\Annotations as Flow;

class BackendController extends \TYPO3\Flow\Mvc\Controller\ActionController 
{
 
    /**
    * @var DasOe\SimpleTeaser\Domain\Repository\TeaserRepository
    * @Flow\Inject
    */
    protected $teaserRepository;
    
    
    /**
     * @Flow\Inject
     * @var \TYPO3\Flow\Resource\ResourceManager
     */
    protected $resourceManager;
    
    /**
     * @return void
     */
    public function indexAction()
    {
        $teasers = $this->teaserRepository->findAll();
        $this->view->assign('teasers', $teasers);

    }

    /**
     * New teaser function
     *
     * @return void
     */
    public function newAction() {

    }
        
    /**
     * Creates new teaser
     *
     * @param \DasOe\SimpleTeaser\Domain\Model\Teaser $newTeaser 
    * @return void
     */
    public function createAction( \DasOe\SimpleTeaser\Domain\Model\Teaser $newTeaser ) {
            $this->teaserRepository->add($newTeaser);
            $this->addFlashMessage('Created a new Teaser.');
            $this->forward('index');
    }
       
      /**
     * Creates new teaser
     *
     * @param \DasOe\SimpleTeaser\Domain\Model\Teaser $newTeaser 
     * @return void
     */
    public function editAction( \DasOe\SimpleTeaser\Domain\Model\Teaser $teaser ) {
        $this->view->assign('teaser', $teaser);
    }  
   
          /**
     * Creates new teaser
     *
     * @param \DasOe\SimpleTeaser\Domain\Model\Teaser $teaser 
     * @return void
     */
    public function deleteAction( \DasOe\SimpleTeaser\Domain\Model\Teaser $teaser ) {
        $name = $teaser->getHeader();
        $this->teaserRepository->remove($teaser);
        $this->persistenceManager->persistAll();

        $this->addFlashMessage('Teaser  deleted successfuly.');
        $this->forward('index');
    }  
    
    	/**
	 * Update logo
	 *
     * @param \DasOe\SimpleTeaser\Domain\Model\Teaser $teaser 
	 * @param \TYPO3\Flow\Resource\Resource $image Instance of resource
	 * @return void
	 */
	public function updateAction(\DasOe\SimpleTeaser\Domain\Model\Teaser $teaser) {
	
		$this->teaserRepository->update($teaser);
		$this->addFlashMessage('Teaset updates successfuly.');
		$this->redirect('index');
	}
    
       
 }