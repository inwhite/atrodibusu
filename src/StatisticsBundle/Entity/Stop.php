<?php

namespace StatisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

/**
 * Stop
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="StatisticsBundle\Repository\StopRepository")
 */
class Stop
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

	/**
	 * @ORM\OneToMany(targetEntity="RouteStop", mappedBy="stop")
	 * @Exclude
	 **/
	private $routeStops;

	/**
	 * @ORM\OneToMany(targetEntity="Time", mappedBy="stop")
	 **/
	private $times;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Stop
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->routeStops = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add routeStops
     *
     * @param \StatisticsBundle\Entity\RouteStop $routeStops
     * @return Stop
     */
    public function addRouteStop(\StatisticsBundle\Entity\RouteStop $routeStops)
    {
        $this->routeStops[] = $routeStops;

        return $this;
    }

    /**
     * Remove routeStops
     *
     * @param \StatisticsBundle\Entity\RouteStop $routeStops
     */
    public function removeRouteStop(\StatisticsBundle\Entity\RouteStop $routeStops)
    {
        $this->routeStops->removeElement($routeStops);
    }

    /**
     * Get routeStops
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRouteStops()
    {
        return $this->routeStops;
    }

    /**
     * Add times
     *
     * @param \StatisticsBundle\Entity\Time $times
     * @return Stop
     */
    public function addTime(\StatisticsBundle\Entity\Time $times)
    {
        $this->times[] = $times;

        return $this;
    }

    /**
     * Remove times
     *
     * @param \StatisticsBundle\Entity\Time $times
     */
    public function removeTime(\StatisticsBundle\Entity\Time $times)
    {
        $this->times->removeElement($times);
    }

    /**
     * Get times
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTimes()
    {
        return $this->times;
    }
}
