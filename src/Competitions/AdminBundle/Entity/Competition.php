<?php

namespace Competitions\AdminBundle\Entity;

/**
 * Competition
 */
class Competition {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Competition
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $start_date;

    /**
     * @var \DateTime
     */
    private $end_date;

    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $website;

    /**
     * Set description
     *
     * @param string $description
     * @return Competition
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set start_date
     *
     * @param \DateTime $startDate
     * @return Competition
     */
    public function setStartDate($startDate) {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get start_date
     *
     * @return \DateTime 
     */
    public function getStartDate() {
        return $this->start_date;
    }

    /**
     * Set end_date
     *
     * @param \DateTime $endDate
     * @return Competition
     */
    public function setEndDate($endDate) {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get end_date
     *
     * @return \DateTime 
     */
    public function getEndDate() {
        return $this->end_date;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Competition
     */
    public function setLocation($location) {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Competition
     */
    public function setWebsite($website) {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite() {
        return $this->website;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categories;

    /**
     * Constructor
     */
    public function __construct() {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categories
     *
     * @param \Competitions\AdminBundle\Entity\Category $categories
     * @return Competition
     */
    public function addCategorie(\Competitions\AdminBundle\Entity\Category $categories) {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Competitions\AdminBundle\Entity\Category $categories
     */
    public function removeCategorie(\Competitions\AdminBundle\Entity\Category $categories) {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories() {
        return $this->categories;
    }

    public function __toString() {
        if (is_null($this->name))
            return '';
        return $this->name;
    }

    public function getMainCategory() {
        if (count($this->categories) > 0)
            return $this->categories[0];
        return "";
    }

    /**
     * @var string
     */
    private $logo;

    /**
     * Set logo
     *
     * @param string $logo
     * @return Competition
     */
    public function setLogo(\Symfony\Component\HttpFoundation\File\UploadedFile $logo = null) {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo() {
        return $this->logo;
    }

    public function upload() {
        // the file property can be empty if the field is not required
        if (null === $this->getLogo()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and then the
        // target filename to move to

        $filename = rand() . '.' . $this->getLogo()->guessExtension();

        $this->getLogo()->move(
                $this->getUploadRootDir(), $filename
        );

        // set the path property to the filename where you've saved the file
        $this->logo = $filename;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads';
    }

}