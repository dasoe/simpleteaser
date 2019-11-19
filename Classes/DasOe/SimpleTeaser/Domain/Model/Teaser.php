<?php
namespace DasOe\SimpleTeaser\Domain\Model;

/*
 * This file is part of the DasOe.SimpleTeaser package.
 */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Teaser
{

    /**
     * @var string
     */
    protected $header;

    /**
     * @var string
     */
    protected $description;

    /**
     * @ORM\OneToOne(cascade={"persist"})
     * @var \TYPO3\Media\Domain\Model\Image
     * 
     */
    protected $image;

    /**
     * @var string
     */
    protected $linkTo;

    /**
     * @var boolean
     */
    protected $border;


    /**
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param string $header
     * @return void
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \TYPO3\Media\Domain\Model\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param \TYPO3\Media\Domain\Model\Image
     * @return void
     */
    public function setImage(\TYPO3\Media\Domain\Model\Image $image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getLinkTo()
    {
        return $this->linkTo;
    }

    /**
     * @param string $linkTo
     * @return void
     */
    public function setLinkTo($linkTo)
    {
        $this->linkTo = $linkTo;
    }

    /**
     * @return boolean
     */
    public function getBorder()
    {
        return $this->border;
    }

    /**
     * @param boolean $border
     * @return void
     */
    public function setBorder($border)
    {
        $this->border = $border;
    }

}
